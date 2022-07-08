<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\AdresseRolle;
use App\Models\Project;
use App\Models\UserRight;
use Illuminate\Http\Request;
use App\Models\XentralUser;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use View;

class XentralUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session()->has('username')) {
        $users = XentralUser::all();

        return View('users.index', compact('users'));
      }
      Session::flash('status', 'Sie dürfen die Seite nicht zugreifen!');
      return redirect::to('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(session()->has('username')) {
        // load the create form (app/views/users/create.blade.php)
        return View('users.create');
      }
      Session::flash('status', 'Sie dürfen die Seite nicht zugreifen!');
      return redirect::to('/login');
    }

    // set nummernkreis der Mitarbeiternummer
    public function updatemanummer(Request $request)
    {
      $letztemitarbeiternummer = XentralUser::where('standardetikett', '=', 25)->latest('id')->first();
      $naechstemitarbeiternummer  = intval($letztemitarbeiternummer->username) + 1;
         if (XentralUser::where('username', $request->get('nummernkreis'))->exists())
         {
           Session::flash('error', 'Mitarbeiternummer ist bereits existiert!');
           return redirect::to('/users/setting');
         }

         if($request->get('nummernkreis') <= $letztemitarbeiternummer->username){
           Session::flash('error', 'Die neue Nummernkreisnummer soll größer als letzte Mitarbeiternummer sein!');
           return redirect::to('/users/setting');
         }

        if($request->get('nummernkreis') != $naechstemitarbeiternummer)
        {
          $this->validate($request, [
            'nummernkreis' => 'required|numeric',
          ]);
          $naechstemitarbeiternummer = intval($request->get('nummernkreis'));
          session(['naechstemitarbeiternummer'=>intval($request->get('nummernkreis'))]);
          Session::flash('success', 'Mitarbeiternummernkreis wurde erfolgreich aktualisiert!');
          return redirect::to('/users');
        }
        return redirect::to('/users');
    }

    /**
     * Show the form for User Setting.
     */
    public function setting()
    {
        if(session()->has('username'))
        {
          $adminusers = User::all();
          $letztemitarbeiternummer = XentralUser::where('standardetikett', '=', 25)->latest('id')->first();
          $lastnummer = intval($letztemitarbeiternummer->username);
          $naechstemitarbeiternummer = session('naechstemitarbeiternummer');
          // load the create form (app/views/users/setting.blade.php)
          return View('users.setting', compact('naechstemitarbeiternummer', 'lastnummer', 'adminusers'));
        }
          Session::flash('status', 'Sie dürfen die Seite nicht zugreifen!');
          return redirect::to('/login');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(session()->has('username')) {
        // get the user
        $user = XentralUser::find($id);

        // show the view and pass the user to it
        return View('users.show', compact('user'));
      }
      Session::flash('status', 'Sie dürfen die Seite nicht zugreifen!');
      return redirect::to('/login');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // validate adresse
        $this->validate($request, [
            'typ' => 'required',
            'name' => 'required|string|regex:/^[A-Za-z]+([\ A-Za-z]+)*/',
            'email' => 'required|string|max:255|unique:adresse',
            'abteilung' => 'nullable',
            'telefon' => 'nullable|numeric',
            'ansprechpartner' => 'nullable|alpha',
            'freifeld1' => 'required|in:intern,extern',
            'username' => 'required|string|regex:/^\S*$/u|max:255|unique:user',
            'password' => 'required|string|same:repassword|min:8',
            'repassword' => 'required|min:8|same:password',
        ]);

        // store adresse
        $neuadresse = new Adresse([
            'typ' => $request->get('typ'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'abteilung' => $request->get('abteilung'),
            'telefon' => $request->get('telefon'),
            'ansprechpartner' => $request->get('ansprechpartner'),
            'freifeld1' => $request->get('freifeld1'),
            'bundesstaat' => 'NRW',
            'firma' => 1,
            'logdatei' => now(),
            'mandatsreferenzart' => 'einmalig',
            'mandatsreferenzwdhart' => 'erste',
            'rechnung_typ' => 'firma',
            'rechnung_land' => 'DE',
            'sprache' => 'deutsch',
            'projekt' => 10
        ]);
        $neuadresse->save();

        // store user
        $newuser = new XentralUser([
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'repassword' => Hash::make($request->get('repassword')),
            'remember_token' => Hash::make($request->get('password')),
            'type' => 'standard',
            'adresse' => $neuadresse->id,
            'settings' => 'Tjs=',
            'startseite' => 'index.php?module=welcome&action=start',
            'logdatei' => now(),
            'activ' => 1,
            'sprachebevorzugen' => 'deutsch',
            'externlogin' => 1,
            'standardetikett' => 43
        ]);
        $newuser->save();

        $neuenummer = session('naechstemitarbeiternummer');
        $letztemitarbeiternummer = XentralUser::where('standardetikett', '=', 25)->latest('id')->first();

          if ($neuenummer == intval($letztemitarbeiternummer->username)){
            $neuenummer = intval($letztemitarbeiternummer->username) + 1;
            }
            elseif($neuenummer != intval($letztemitarbeiternummer->username)){
            $neuenummer = session('naechstemitarbeiternummer');
           }

        // store stechuhr user
      $stechuhr = new XentralUser([
          'username' => strval($neuenummer),  // nummernkreis in setting request setzten
          'password' => Hash::make($request->get('password')),
          'repassword' => Hash::make($request->get('repassword')),
          'remember_token' => Hash::make($request->get('password')),
          'type' => 'standard',
          'adresse' => $neuadresse->id,
          'startseite' => 'index.php?module=stechuhr&action=list',
          'logdatei' => now(),
          'activ' => 1,
          'sprachebevorzugen' => 'deutsch',
          'externlogin' => 1,
          'standardetikett' => 25,
          'stechuhrdevice' => strval($neuenummer) . 'RzA5US8F5Z',
      ]);
          $stechuhr->save();

        // store rolle
        $projektinput = Project::select('id')->where('abkuerzung', request('projekt'))->first();
        $rolle = new AdresseRolle([
            'adresse' => $neuadresse->id,
            'projekt' => 0,
            'subjekt' => 'Mitarbeiter',
            'praedikat' => 'von',
            'objekt' => 'projekt',
            'parameter' => '',
            'von' => now(),
            'bis' => date('0000-00-00'),
        ]);
        $rolle->save();

// Rchte Multidiminsionale Array
        $rechte =
            [
                "abrechnung" => ['zeiterfassung'],

                "adresse" => ['abrechnungzeit',
                    'abrechnungzeitabgeschlossen',
                    'artikel',
                    'abrechnungzeitdelete',
                    'delkontakt',
                    'createdokument',
                    'kundeartikel',
                    'stundensatzdelete',
                    'stundensatz',
                    'newkontakt',
                    'minidetail',
                    'lohn',
                    'stundensatzedit',
                    'multilevel',
                    'addposition',
                    'adressebestellungmarkieren',
                    'ansprechpartner',
                    'ansprechpartnereditpopup',
                    'ansprechpartnerpopup',
                    'artikeleditpopup',
                    'auftraege',
                    'autocomplete',
                    'edit',
                    'downartikel',
                    'create',
                    'briefpdf',
                    'delete',
                    'delartikel',
                    'briefdelete',
                    'brief',
                    'dateien',
                    'email',
                    'kundevorlage',
                    'list',
                    'positioneneditpopup',
                    'ustprfedit',
                    'ustprfneu',
                    'rolecreate',
                    'lieferadresse',
                    'emaileditpopup',
                    'briefeditpopup',
                    'kontakthistorie',
                    'lieferadresseneditpopup',
                    'roledel',
                    'suchmaske',
                    'upartikel',
                    'rolledelete',
                    'lieferadressepopup',
                    'lieferantartikel',
                    'kontakthistorieeditpopup',
                    'ustpopup',
                    'lieferantvorlage',
                    'offenebestellungen',
                    'ustprf'],

                "ajax" => ['ansprechpartner',
                    'lieferadresse',
                    'filter',
                    'table',
                    'tableposition',
                    'tooltipsuche',
                    'tcgetnextartikelnummer'],

                "angebot" => ['addposition'],

                "api" => ['shopimages'],

                "arbeitsnachweis" => ['abschicken',
                    'addposition',
                    'copy',
                    'createfromproject',
                    'delarbeitsnachweisposition',
                    'list',
                    'editable',
                    'downarbeitsnachweisposition',
                    'delete',
                    'livetabelle',
                    'positionen',
                    'protokoll',
                    'uparbeitsnachweisposition',
                    'minidetail',
                    'pdf',
                    'edit',
                    'create',
                    'freigabe',
                    'positioneneditpopup',
                    'inlinepdf',
                    'abrechnung'],

                "artikel" => ['ausreservieren',
                    'instueckliste',
                    'einkaufdisable',
                    'lagerlampe',
                    'schliessen',
                    'stuecklisteempty',
                    'provision',
                    'statistik',
                    'produktion',
                    'stuecklisteetiketten',
                    'minidetail',
                    'shopexport',
                    'stuecklisteimport',
                    'verkaufdisable',
                    'shopexportfiles',
                    'stuecklisteupload',
                    'umlagern',
                    'multilevel',
                    'ajaxwerte',
                    'delete',
                    'einkaufcopy',
                    'newlist',
                    'projekte',
                    'delstueckliste',
                    'einkaufdelete',
                    'offeneauftraege',
                    'verkaufeditpopup',
                    'offenebestellungen',
                    'reservierung',
                    'stueckliste',
                    'upstueckliste',
                    'wareneingang',
                    'downstueckliste',
                    'copy',
                    'edit',
                    'einkaufeditpopup',
                    'list',
                    'onlineshop',
                    'verkauf',
                    'seriennummern',
                    'verkaufcopy',
                    'create',
                    'editstueckliste',
                    'dateien',
                    'einkauf',
                    'etiketten',
                    'profisuche',
                    'verkaufdelete',
                    'artikelfreifelder',
                    'artikelfreifelderedit',
                    'artikelfreifeldersave',
                    'baumedit',
                    'srnlageredit',
                    'zertifikate',
                    'srnadresseedit',
                    'schnellanlegen',
                    'lagersync',
                    'chargedelete',
                    'copyedit',
                    'srnlagerdelete',
                    'mindesthaltbarkeitsdatum',
                    'demo',
                    'chargen',
                    'fremdnummern',
                    'thumbnail',
                    'eigenschaftencopy',
                    'artikelfreifelderdelete',
                    'mhddelete',
                    'einlagern',
                    'eigenschaftensuche',
                    'rohstoffeempty',
                    'shopimport',
                    'fremdnummerndelete',
                    'fremdnummernedit',
                    'auslagern',
                    'rohstoffe',
                    'baum',
                    'fremdnummernsave',
                    'eigenschaften',
                    'eigenschafteneditpopup',
                    'editrohstoffe',
                    'rabatt',
                    'belege',
                    'stuecklisteexport',
                    'baumajax',
                    'delrohstoffe',
                    'copysave',
                    'lager',
                    'baumdetail',
                    'eigenschaftendelete'],

                "artikelbaum" => ['change',
                    'list',
                    'loeschen',
                    'detail',
                    'baumajax'],

                "artikeleigenschaften" => ['create',
                    'list',
                    'delete',
                    'edit'],

                "artikeleinheit" => ['create',
                    'edit',
                    'delete',
                    'list'],

                "artikelgruppen" => ['delete',
                    'create',
                    'edit',
                    'list'],

                "artikelkalkulation" => ['delete',
                    'ekladen',
                    'kalkekladen',
                    'edittag',
                    'gesperrt',
                    'list',
                    'edit',
                    'savetag',
                    'save'],

                "artikelkategorien" => ['delete',
                    'create',
                    'edit',
                    'list'],

                "artikel_fremdnummern" => ['edit',
                    'save',
                    'delete',
                    'list'],

                "artikel_texte" => ['delete',
                    'edit',
                    'list',
                    'save'],

                "auftrag" => ['abschluss',
                    'inlinepdf',
                    'anfrage',
                    'abschicken',
                    'checkdisplay',
                    'downauftragposition',
                    'list',
                    'positionen',
                    'uststart',
                    'copy',
                    'edit',
                    'livetabelle',
                    'positioneneditpopup',
                    'search',
                    'verfuegbar',
                    'addposition',
                    'create',
                    'editable',
                    'minidetail',
                    'proforma',
                    'shopexport',
                    'versand',
                    'dateien',
                    'freigabe',
                    'nachlieferung',
                    'protokoll',
                    'teillieferung',
                    'ausversand',
                    'delauftragposition',
                    'rechnung',
                    'tracking',
                    'zahlungsmahnungswesen',
                    'berechnen',
                    'delete',
                    'lieferschein',
                    'pdf',
                    'reservieren',
                    'upauftragposition',
                    'zahlungsmail',
                    'summe'],

                "bestellung" => ['auftrag',
                    'livetabelle',
                    'inlinepdf',
                    'abschicken',
                    'delbestellungposition',
                    'positioneneditpopup',
                    'addposition',
                    'delete',
                    'list',
                    'protokoll',
                    'downbestellungposition',
                    'copy',
                    'edit',
                    'minidetail',
                    'upbestellungposition',
                    'create',
                    'editable',
                    'pdf',
                    'dateien',
                    'freigabe',
                    'positionen'],

                "bestellvorschlag" => ['create',
                    'tabelle',
                    'list'],

                "dateien" => ['abschicken',
                    'archiv',
                    'artikel',
                    'freigabe',
                    'kundeuebernehmen',
                    'versand',
                    'lieferadresseneu',
                    'zahlung',
                    'protokoll',
                    'listfreigegebene',
                    'lieferadresseauswahl',
                    'edit',
                    'send',
                    'create',
                    'delete',
                    'list'],

                "etiketten" => ['create',
                    'edit',
                    'list',
                    'delete'],

                "generic" => ['edit',
                    'reiter_delete',
                    'reiter_up',
                    'reiter_down'],

                "gutschrift" => ['zahlungseingang',
                    'zahlungsmahnungswesen',
                    'inlinepdf',
                    'abschicken',
                    'edit',
                    'minidetail',
                    'storno',
                    'addposition',
                    'editable',
                    'pdf',
                    'upgutschriftposition',
                    'create',
                    'freigabe',
                    'positionen',
                    'delete',
                    'positioneneditpopup',
                    'delgutschriftposition',
                    'list',
                    'protokoll',
                    'downgutschriftposition',
                    'livetabelle'],

                "hauptmenu" => ['list'],

                "inhalt" => ['delete',
                    'listshop',
                    'create',
                    'edit',
                    'list'],

                "inventur" => ['abschicken',
                    'addposition',
                    'buchen',
                    'copy',
                    'create',
                    'createfromproject',
                    'freigabe',
                    'editable',
                    'edit',
                    'downinventurposition',
                    'delinventurposition',
                    'delete',
                    'list',
                    'livetabelle',
                    'minidetail',
                    'pdf',
                    'positionen',
                    'positioneneditpopup',
                    'protokoll',
                    'upinventurposition',
                    'automatisch'],

                "kalender" => ['data',
                    'eventdata',
                    'taskstatus',
                    'update',
                    'delete',
                    'list'],

                "kasse" => ['exportieren'],

                "lager" => ['auslagernproduktion',
                    'deleteplatz',
                    'buchenzwischenlagerdelete',
                    'lagerpdfsammelentnahme',
                    'inventurladen',
                    'artikelentfernen',
                    'artikelentfernenreserviert',
                    'artikelfuerlieferungen',
                    'ausgehend',
                    'bestand',
                    'buchenzwischenlager',
                    'bucheneinlagern',
                    'buchenauslagern',
                    'buchen',
                    'bewegungpopup',
                    'bewegung',
                    'create',
                    'delete',
                    'edit',
                    'etiketten',
                    'platzeditpopup',
                    'list',
                    'platz',
                    'inventur',
                    'produktionslager',
                    'regaletiketten',
                    'reservierungen',
                    'zwischenlager',
                    'nachschublager'],

                "lagermobil" => ['artikelentfernen',
                    'ausgehend',
                    'auslagernproduktion',
                    'auslagern',
                    'artikelentfernenreserviert',
                    'bewegung',
                    'buchen',
                    'buchenauslagern',
                    'bucheneinlagern',
                    'artikelfuerlieferungen',
                    'buchenzwischenlager',
                    'delete',
                    'buchenzwischenlagerdelete',
                    'create',
                    'differenzen',
                    'deleteplatz',
                    'bewegungpopup',
                    'edit',
                    'einlagern',
                    'differenzenlagerplatz',
                    'differenzenlagerplatzsave',
                    'etiketten',
                    'inhalt',
                    'differenzenlagerplatzedit',
                    'lagerpdfsammelentnahme',
                    'letztebewegungen',
                    'platz',
                    'lpumlagern',
                    'nachschublager',
                    'list',
                    'reservierungen',
                    'produktionslager',
                    'schnelleinlagern',
                    'zwischenlager',
                    'regaletiketten',
                    'wert',
                    'platzeditpopup'],

                "lieferschein" => ['paketmarke',
                    'inlinepdf',
                    'abschicken',
                    'addposition',
                    'copy',
                    'create',
                    'delete',
                    'dellieferscheinposition',
                    'list',
                    'freigabe',
                    'editable',
                    'edit',
                    'downlieferscheinposition',
                    'livetabelle',
                    'minidetail',
                    'pdf',
                    'positionen',
                    'positioneneditpopup',
                    'uplieferscheinposition',
                    'protokoll'],

                "linkeditor" => ['delete',
                    'massedit',
                    'deleterule',
                    'help',
                    'list',
                    'status'],

                "lohnabrechnung" => ['details',
                    'list',
                    'minidetail',
                    'monatsuebersicht'],

                "mobile" => ['auslagern',
                    'cancel',
                    'einlagern',
                    'list',
                    'umlagern'],

                "multilevel" => ['create',
                    'edit',
                    'list'],

                "multiorderpicking" => ['edit',
                    'fehler',
                    'list',
                    'label',
                    'minidetail',
                    'versandzentrum',
                    'listmobile'],

                "paketmarke" => ['create',
                    'tracking'],

                "rechnung" => ['zahlungseingang',
                    'forderungsverlust',
                    'inlinepdf',
                    'manuellbezahltentfernen',
                    'manuellbezahltmarkiert',
                    'multilevel',
                    'abschicken',
                    'destop',
                    'freigabe',
                    'mahnpdf',
                    'search',
                    'addposition',
                    'downrechnungposition',
                    'gutschrift',
                    'mahnwesen',
                    'pdf',
                    'skonto',
                    'copy',
                    'dta',
                    'mahnweseneinstellungen',
                    'positionen',
                    'stop',
                    'create',
                    'edit',
                    'lastschrift',
                    'positioneneditpopup',
                    'uprechnungposition',
                    'delete',
                    'editable',
                    'list',
                    'protokoll',
                    'delrechnungposition',
                    'livetabelle',
                    'minidetail',
                    'zahlungsmahnungswesen'],

                "rechnungslauf" => ['archiv',
                    'create',
                    'edit',
                    'list',
                    'mahnwesen',
                    'zahlungseingang',
                    'artikel',
                    'rechnungslauf'],

                "reisekostenart" => ['create',
                    'delete',
                    'edit',
                    'list'],

                "seriennummern" => ['create',
                    'edit',
                    'delete',
                    'lager',
                    'log',
                    'list',
                    'produktion'],

                "stornierungen" => ['create',
                    'edit',
                    'bezahlt',
                    'list'],

                "survey" => ['list'],

                "ticket_old" => ['antwort',
                    'beantwortet',
                    'delete',
                    'edit',
                    'freigabe',
                    'create',
                    'list',
                    'assistent'],

                "uebersetzung" => ['main'],

                "verrechnungsart" => ['create',
                    'delete',
                    'edit'],

                "versanderzeugen" => ['einzel',
                    'frankieren',
                    'list',
                    'main',
                    'offene',
                    'korrektur',
                    'gelesen',
                    'delete'],

                "vmajax" => ['vmautoversanddrucken',
                    'vmautoversanddruckencheckbatch'],

                "wareneingang" => ['main',
                    'removevorgang',
                    'vorgang',
                    'help',
                    'create',
                    'distriabschluss',
                    'distribution',
                    'distrietiketten',
                    'distriinhalt',
                    'list',
                    'paketabschliessen',
                    'paketabsender',
                    'paketannahme',
                    'paketetikett',
                    'rmalist',
                    'rmadetail',
                    'paketzustand',
                    'manuellerfassen',
                    'minidetail'],

                "warteschlangen" => ['create',
                    'delete',
                    'edit',
                    'list'],

                "welcome" => ['help',
                    'info',
                    'list',
                    'start',
                    'settings',
                    'addnote',
                    'delnote',
                    'movenote',
                    'oknote',
                    'pinwand',
                    'upgrade',
                    'startseite',
                    'css',
                    'logo',
                    'editvorgang',
                    'logout',
                    'main',
                    'login',
                    'vorgang',
                    'removevorgang'],

                "wiki" => ['alle',
                    'create',
                    'delete',
                    'edit',
                    'list',
                    'rename',
                    'dateien'],

                "wizard" => ['adresse',
                    'create',
                    'list'],

                "zeiterfassung" => ['abrechnenpdf',
                    'listuser',
                    'minidetail',
                    'arbeitspaket',
                    'create',
                    'delete',
                    'details',
                    'edit',
                    'list']
            ];
    // store rights for user xentral login
        foreach ($rechte as $modul => $rights) {
            foreach ($rights as $right) {
                $userrights = new UserRight([
                   'user' => $newuser->id,
                   'module' => $modul,
                   'action' => $right,
                   'permission' => 1,
                ]);
                $userrights->save();
              }
            }

      // store Right for stechuhr
                $stechuhrrechte = [
                  "welcome" => ['login', 'logout', 'start', 'startseite', 'settings', ],
                  "stechuhr" => ['change', 'list', 'change', 'list', 'change', 'list', 'change', 'list']
                ];
                foreach ($stechuhrrechte as $moduls => $stechrechts){
                  foreach ($stechrechts as $stechrecht) {
                  $userrightes = new UserRight([
                       'user' => $stechuhr->id,
                       'module' => $moduls,
                       'action' => $stechrecht,
                       'permission' => 1,
                    ]);
                    $userrightes->save();                  }
                }

        Session::flash('success', 'Benutzer wurde erflogreich angelegt!');
        return redirect::to('/users/id=' . $newuser->id);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = XentralUser::find($id);

        if(session()->has('username')) {
        return View('users.edit', compact('user'));
      }
      Session::flash('status', 'Sie dürfen die Seite nicht zugreifen!');
      return redirect::to('/login');
    }

    /**
     * Update the specified resource in storage.
     */

// Validate Update
    public function update(Request $request)
    {
          $this->validate($request, [
              'typ' => 'sometimes',
              'name' => 'sometimes|string|regex:/^[A-Za-z]+([\ A-Za-z]+)*/',
              'abteilung' => 'sometimes|nullable',
              'telefon' => 'sometimes|nullable|numeric',
              'ansprechpartner' => 'sometimes|alpha|nullable',
              'username' => 'sometimes|string|regex:/^\S*$/u|max:255',

          ]);

// only if password has be changed then make the validate otherwise not validate
$user = XentralUser::find($request->user_id);
          if($request->get('password') != $user->password){
            $this->validate($request, [
              'password' => 'sometimes|required_with:repassword|string|min:8',
              'repassword' => 'sometimes|required_with:password|same:password',
              ]);
          }

// Store Update in adresse table
        $adresse = Adresse::find($request->adresse_id);
          $adresse->typ = $request->typ;
          $adresse->name = $request->name;
          $adresse->email = $request->email;
          $adresse->abteilung = $request->abteilung;
          $adresse->telefon = $request->telefon;
          $adresse->ansprechpartner = $request->ansprechpartner;
          $adresse->freifeld1 = $request->freifeld1;
           $adresse->save();

// Store Update in user table
      $user = XentralUser::find($request->user_id);
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->repassword = Hash::make($request->repassword);
        $user->remember_token = Hash::make($request->password);
          $user->save();
// Update Feedback
        Session::flash('success', 'Benutzer wurde erfolgreich bearbeitet!');
        return redirect::to('/users/');
  }
}

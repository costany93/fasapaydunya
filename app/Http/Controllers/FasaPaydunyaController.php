<?php

namespace App\Http\Controllers;

use App\Donateur;
use App\Helpers\AccessPaydunya;
use App\Http\Requests\PaydunyaRequest;
use App\Pays;
use Illuminate\Http\Request;
use Paydunya\Checkout\CheckoutInvoice as Invoice;
use Paydunya\Setup as pay;
use Paydunya\Checkout\Store as store;


class FasaPaydunyaController extends Controller
{

    public function index(){
        $pays = Pays::pluck('name', 'id')->all();
        return view('fasapay.index', compact('pays'));
    }

    public function MakePaiement(PaydunyaRequest $request){

                $input = $request->all();
                $pays_id = $request->pays;

                $input['pays_id'] = $pays_id;

                $key = AccessPaydunya::MyAccess();
                //information sur mon Api
                pay::setMasterKey($key['masterKey']);
                pay::setPublicKey($key['publicKey']);
                pay::setPrivateKey($key['privateKey']);
                pay::setToken($key['token']);

                $store = AccessPaydunya::store();
                //Configuration des informations de votre service/entreprise
                store::setName($store['name']); // Seul le nom est requis
                store::setTagline($store['tagline']);
                store::setPhoneNumber($store['phone']);
                store::setPostalAddress($store['address']);
                store::setWebsiteUrl($store['websiteurl']);
                store::setLogoUrl($store['logourl']);

                //configuration de l'url de callback
                /*store::setReturnUrl($store['returnurl']);
                store::setCancelUrl($store['cancelurl']);*/

                

                
                $info = AccessPaydunya::information();
                //configuration d'un test de paiement
                $invoice = new Invoice();
                /* L'ajout d'éléments à votre facture est très basique.
                Les paramètres attendus sont nom du produit, la quantité, le prix unitaire,
                le prix total et une description optionelle. */
                $invoice->addItem($info['productname'], $info['quantity'], $request->montant, $request->montant, $info['description']);
                $invoice->setTotalAmount($request->montant);
        
                
                //A insérer dans le fichier du code source qui doit effectuer l'action
        
                // Le code suivant décrit comment créer une facture de paiement au niveau de nos serveurs,
                // rediriger ensuite le client vers la page de paiement
                // et afficher ensuite son reçu de paiement en cas de succès.
                if($invoice->create()) {
                    Donateur::create($input);
                     return redirect($invoice->getInvoiceUrl());
                }else{
                    return redirect('/');
                }
        
    }

    public function pays(){
        $country_list = array(
            "Afghanistan",
            "Albania",
            "Algeria",
            "Andorra",
            "Angola",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bhutan",
            "Bolivia",
            "Bosnia and Herzegovina",
            "Botswana",
            "Brazil",
            "Brunei",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Cape Verde",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Colombi",
            "Comoros",
            "Congo (Brazzaville)",
            "Congo",
            "Costa Rica",
            "Cote d'Ivoire",
            "Croatia",
            "Cuba",
            "Cyprus",
            "Czech Republic",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "East Timor (Timor Timur)",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Ethiopia",
            "Fiji",
            "Finland",
            "France",
            "Gabon",
            "Gambia, The",
            "Georgia",
            "Germany",
            "Ghana",
            "Greece",
            "Grenada",
            "Guatemala",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Honduras",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran",
            "Iraq",
            "Ireland",
            "Israel",
            "Italy",
            "Jamaica",
            "Japan",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Korea, North",
            "Korea, South",
            "Kuwait",
            "Kyrgyzstan",
            "Laos",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Macedonia",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Mauritania",
            "Mauritius",
            "Mexico",
            "Micronesia",
            "Moldova",
            "Monaco",
            "Mongolia",
            "Morocco",
            "Mozambique",
            "Myanmar",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Poland",
            "Portugal",
            "Qatar",
            "Romania",
            "Russia",
            "Rwanda",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Vincent",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia and Montenegro",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Swaziland",
            "Sweden",
            "Switzerland",
            "Syria",
            "Taiwan",
            "Tajikistan",
            "Tanzania",
            "Thailand",
            "Togo",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Vatican City",
            "Venezuela",
            "Vietnam",
            "Yemen",
            "Zambia",
            "Zimbabwe"
        );

        for($i = 0; $i < count($country_list); $i++){
            echo $country_list[$i].'<br>';

            Pays::create(['name' => $country_list[$i]]);
        }
    }
}

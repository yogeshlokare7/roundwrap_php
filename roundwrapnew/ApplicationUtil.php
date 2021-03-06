<?php

$inavtivecolor = "background-color: rgb(251,210,210)";

function getcurrency($key = "") {
    $arraycurrency = array();
    $arraycurrency["CAD"] = "Canada Dollars";
    $arraycurrency["USD"] = "United States Dollars";
    $arraycurrency["EUR"] = "Euro";
    $arraycurrency["GBP"] = "United Kingdom Pounds";
    $arraycurrency["DZD"] = "Algeria Dinars";
    $arraycurrency["ARP"] = "Argentina Pesos";
    $arraycurrency["AUD"] = "Australia Dollars";
    $arraycurrency["ATS"] = "Austria Schillings";
    $arraycurrency["BSD"] = "Bahamas Dollars";
    $arraycurrency["BBD"] = "Barbados Dollars";
    $arraycurrency["BEF"] = "Belgium Francs";
    $arraycurrency["BMD"] = "Bermuda Dollars";
    $arraycurrency["BRR"] = "Brazil Real";
    $arraycurrency["BGL"] = "Bulgaria Lev";
    $arraycurrency["CLP"] = "Chile Pesos";
    $arraycurrency["CNY"] = "China Yuan Renmimbi";
    $arraycurrency["CYP"] = "Cyprus Pounds";
    $arraycurrency["CSK"] = "Czech Republic Koruna";
    $arraycurrency["DKK"] = "Denmark Kroner";
    $arraycurrency["NLG"] = "Dutch Guilders";
    $arraycurrency["XCD"] = "Eastern Caribbean Dollars";
    $arraycurrency["EGP"] = "Egypt Pounds";
    $arraycurrency["FJD"] = "Fiji Dollars";
    $arraycurrency["FIM"] = "Finland Markka";
    $arraycurrency["FRF"] = "France Francs";
    $arraycurrency["DEM"] = "Germany Deutsche Marks";
    $arraycurrency["XAU"] = "Gold Ounces";
    $arraycurrency["GRD"] = "Greece Drachmas";
    $arraycurrency["HKD"] = "Hong Kong Dollars";
    $arraycurrency["HUF"] = "Hungary Forint";
    $arraycurrency["ISK"] = "Iceland Krona";
    $arraycurrency["INR"] = "India Rupees";
    $arraycurrency["IDR"] = "Indonesia Rupiah";
    $arraycurrency["IEP"] = "Ireland Punt";
    $arraycurrency["ILS"] = "Israel New Shekels";
    $arraycurrency["ITL"] = "Italy Lira";
    $arraycurrency["JMD"] = "Jamaica Dollars";
    $arraycurrency["JPY"] = "Japan Yen";
    $arraycurrency["JOD"] = "Jordan Dinar";
    $arraycurrency["KRW"] = "Korea (South) Won";
    $arraycurrency["LBP"] = "Lebanon Pounds";
    $arraycurrency["LUF"] = "Luxembourg Francs";
    $arraycurrency["MYR"] = "Malaysia Ringgit";
    $arraycurrency["MXP"] = "Mexico Pesos";
    $arraycurrency["NLG"] = "Netherlands Guilders";
    $arraycurrency["NZD"] = "New Zealand Dollars";
    $arraycurrency["NOK"] = "Norway Kroner";
    $arraycurrency["PKR"] = "Pakistan Rupees";
    $arraycurrency["XPD"] = "Palladium Ounces";
    $arraycurrency["PHP"] = "Philippines Pesos";
    $arraycurrency["XPT"] = "Platinum Ounces";
    $arraycurrency["PLZ"] = "Poland Zloty";
    $arraycurrency["PTE"] = "Portugal Escudo";
    $arraycurrency["ROL"] = "Romania Leu";
    $arraycurrency["RUR"] = "Russia Rubles";
    $arraycurrency["SAR"] = "Saudi Arabia Riyal";
    $arraycurrency["XAG"] = "Silver Ounces";
    $arraycurrency["SGD"] = "Singapore Dollars";
    $arraycurrency["SKK"] = "Slovakia Koruna";
    $arraycurrency["ZAR"] = "South Africa Rand";
    $arraycurrency["KRW"] = "South Korea Won";
    $arraycurrency["ESP"] = "Spain Pesetas";
    $arraycurrency["XDR"] = "Special Drawing Right (IMF)";
    $arraycurrency["SDD"] = "Sudan Dinar";
    $arraycurrency["SEK"] = "Sweden Krona";
    $arraycurrency["CHF"] = "Switzerland Francs";
    $arraycurrency["TWD"] = "Taiwan Dollars";
    $arraycurrency["THB"] = "Thailand Baht";
    $arraycurrency["TTD"] = "Trinidad and Tobago Dollars";
    $arraycurrency["TRL"] = "Turkey Lira";
    $arraycurrency["VEB"] = "Venezuela Bolivar";
    $arraycurrency["ZMK"] = "Zambia Kwacha";
    $arraycurrency["EUR"] = "Euro";
    $arraycurrency["XCD"] = "Eastern Caribbean Dollars";
    $arraycurrency["XDR"] = "Special Drawing Right (IMF)";
    $arraycurrency["XAG"] = "Silver Ounces";
    $arraycurrency["XAU"] = "Gold Ounces";
    $arraycurrency["XPD"] = "Palladium Ounces";
    $arraycurrency["XPT"] = "Platinum Ounces";
    if ($key == "") {
        return $arraycurrency;
    } else {
        return $arraycurrency[$key];
    }
}

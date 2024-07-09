<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Processton\ProcesstonCurrency\Models\Currency;
use Processton\ProcesstonObject\Traits\SchemaTasks\ProcessObject;

return new class extends Migration
{
    use ProcessObject;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('symbol')->nullable();
            $table->integer('precision');
            $table->string('thousand_separator');
            $table->string('decimal_separator');
            $table->boolean('swap_currency_symbol')->default(false);
            $table->tinyInteger('is_active')->default(0);
            $table->string('note')->nullable();
            $table->timestamps();
        });

        // $this->processObjects([
        //     [
        //         "name" => "Currency",
        //         "plural_name" => "Currencies",
        //         "slug" => "currencies",
        //         "model" => Currency::class,
        //         "fields" => [
        //             [
        //                 "name" => "Name",
        //                 "slug" => "name",
        //                 "required"  => true,
        //                 "nullable"  => false,
        //                 "type"  => "text",
        //                 "min" => "3",
        //                 "max" => "128"
        //             ],
        //             [
        //                 "name" => "Code",
        //                 "slug" => "code",
        //                 "required"  => true,
        //                 "nullable"  => false,
        //                 "type"  => "text",
        //                 "min" => "2",
        //                 "max" => "2"
        //             ],
        //             [
        //                 "name" => "Symbol",
        //                 "slug" => "symbol",
        //                 "required"  => true,
        //                 "nullable"  => false,
        //                 "type"  => "text",
        //                 "min" => "2",
        //                 "max" => "10"
        //             ],
        //             [
        //                 "name" => "Precision",
        //                 "slug" => "precision",
        //                 "required"  => false,
        //                 "nullable"  => false,
        //                 "type"  => "number",
        //                 "default" => 0
        //             ],
        //             [
        //                 "name" => "Thousand Separator",
        //                 "slug" => "thousand_separator",
        //                 "required"  => false,
        //                 "nullable"  => false,
        //                 "type"  => "text",
        //                 "default" => 0
        //             ],
        //             [
        //                 "name" => "Decimal Separator",
        //                 "slug" => "decimal_separator",
        //                 "required"  => false,
        //                 "nullable"  => false,
        //                 "type"  => "text",
        //                 "default" => 0
        //             ],
        //             [
        //                 "name" => "Swap Currency Symbol",
        //                 "slug" => "swap_currency_symbol",
        //                 "required"  => false,
        //                 "nullable"  => false,
        //                 "type"  => "boolean",
        //                 "default" => 0
        //             ]
        //         ],
        //     ]
        // ], false);
        
        $currencies = [
            [
                'name' => 'US Dollar',
                'code' => 'USD',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'British Pound',
                'code' => 'GBP',
                'symbol' => 'Â£',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Euro',
                'code' => 'EUR',
                'symbol' => 'â‚¬',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
                'swap_currency_symbol' => true,
            ],
            [
                'name' => 'South African Rand',
                'code' => 'ZAR',
                'symbol' => 'R',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Danish Krone',
                'code' => 'DKK',
                'symbol' => 'kr',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
                'swap_currency_symbol' => true,
            ],
            [
                'name' => 'Swedish Krona',
                'code' => 'SEK',
                'symbol' => 'kr',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
                'swap_currency_symbol' => true,
            ],
            [
                'name' => 'Kenyan Shilling',
                'code' => 'KES',
                'symbol' => 'KSh ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Kuwaiti Dinar',
                'code' => 'KWD',
                'symbol' => 'KWD ',
                'precision' => '3',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Canadian Dollar',
                'code' => 'CAD',
                'symbol' => 'C$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Philippine Peso',
                'code' => 'PHP',
                'symbol' => 'P ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Nepali Rupee',
                'code' => 'NPR',
                'symbol' => 'à¤°à¥‚',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Indian Rupee',
                'code' => 'INR',
                'symbol' => 'â‚¹',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Australian Dollar',
                'code' => 'AUD',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Singapore Dollar',
                'code' => 'SGD',
                'symbol' => 'S$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Norske Kroner',
                'code' => 'NOK',
                'symbol' => 'kr',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
                'swap_currency_symbol' => true,
            ],
            [
                'name' => 'New Zealand Dollar',
                'code' => 'NZD',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Vietnamese Dong',
                'code' => 'VND',
                'symbol' => 'â‚«',
                'precision' => '0',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Swiss Franc',
                'code' => 'CHF',
                'symbol' => 'Fr.',
                'precision' => '2',
                'thousand_separator' => '\'',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Guatemalan Quetzal',
                'code' => 'GTQ',
                'symbol' => 'Q',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Malaysian Ringgit',
                'code' => 'MYR',
                'symbol' => 'RM',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Brazilian Real',
                'code' => 'BRL',
                'symbol' => 'R$',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Thai Baht',
                'code' => 'THB',
                'symbol' => 'à¸¿',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Nigerian Naira',
                'code' => 'NGN',
                'symbol' => 'â‚¦',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Argentine Peso',
                'code' => 'ARS',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Bangladeshi Taka',
                'code' => 'BDT',
                'symbol' => 'Tk',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'United Arab Emirates Dirham',
                'code' => 'AED',
                'symbol' => 'DH ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Hong Kong Dollar',
                'code' => 'HKD',
                'symbol' => 'HK$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Indonesian Rupiah',
                'code' => 'IDR',
                'symbol' => 'Rp',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Mexican Peso',
                'code' => 'MXN',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Egyptian Pound',
                'code' => 'EGP',
                'symbol' => 'EÂ£',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Colombian Peso',
                'code' => 'COP',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Central African Franc',
                'code' => 'XAF',
                'symbol' => 'CFA ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'West African Franc',
                'code' => 'XOF',
                'symbol' => 'CFA ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Chinese Renminbi',
                'code' => 'CNY',
                'symbol' => 'RMB ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Rwandan Franc',
                'code' => 'RWF',
                'symbol' => 'RF ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Tanzanian Shilling',
                'code' => 'TZS',
                'symbol' => 'TSh ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Netherlands Antillean Guilder',
                'code' => 'ANG',
                'symbol' => 'NAÆ’',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Trinidad and Tobago Dollar',
                'code' => 'TTD',
                'symbol' => 'TT$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'East Caribbean Dollar',
                'code' => 'XCD',
                'symbol' => 'EC$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Ghanaian Cedi',
                'code' => 'GHS',
                'symbol' => 'â€ŽGHâ‚µ',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Bulgarian Lev',
                'code' => 'BGN',
                'symbol' => 'Ð›Ð².',
                'precision' => '2',
                'thousand_separator' => ' ',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Aruban Florin',
                'code' => 'AWG',
                'symbol' => 'Afl. ',
                'precision' => '2',
                'thousand_separator' => ' ',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Turkish Lira',
                'code' => 'TRY',
                'symbol' => 'TL ',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Romanian New Leu',
                'code' => 'RON',
                'symbol' => 'RON',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Croatian Kuna',
                'code' => 'HRK',
                'symbol' => 'kn',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Saudi Riyal',
                'code' => 'SAR',
                'symbol' => 'â€ŽSÙAR',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Japanese Yen',
                'code' => 'JPY',
                'symbol' => 'Â¥',
                'precision' => '0',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Maldivian Rufiyaa',
                'code' => 'MVR',
                'symbol' => 'Rf',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Costa Rican ColÃ³n',
                'code' => 'CRC',
                'symbol' => 'â‚¡',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Pakistani Rupee',
                'code' => 'PKR',
                'symbol' => 'Rs ',
                'precision' => '0',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Polish Zloty',
                'code' => 'PLN',
                'symbol' => 'zÅ‚',
                'precision' => '2',
                'thousand_separator' => ' ',
                'decimal_separator' => ',',
                'swap_currency_symbol' => true,
            ],
            [
                'name' => 'Sri Lankan Rupee',
                'code' => 'LKR',
                'symbol' => 'LKR',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
                'swap_currency_symbol' => true,
            ],
            [
                'name' => 'Czech Koruna',
                'code' => 'CZK',
                'symbol' => 'KÄ',
                'precision' => '2',
                'thousand_separator' => ' ',
                'decimal_separator' => ',',
                'swap_currency_symbol' => true,
            ],
            [
                'name' => 'Uruguayan Peso',
                'code' => 'UYU',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Namibian Dollar',
                'code' => 'NAD',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Tunisian Dinar',
                'code' => 'TND',
                'symbol' => 'â€ŽØ¯.Øª',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Russian Ruble',
                'code' => 'RUB',
                'symbol' => 'â‚½',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Mozambican Metical',
                'code' => 'MZN',
                'symbol' => 'MT',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
                'swap_currency_symbol' => true,
            ],
            [
                'name' => 'Omani Rial',
                'code' => 'OMR',
                'symbol' => 'Ø±.Ø¹.',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Ukrainian Hryvnia',
                'code' => 'UAH',
                'symbol' => 'â‚´',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Macanese Pataca',
                'code' => 'MOP',
                'symbol' => 'MOP$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Taiwan New Dollar',
                'code' => 'TWD',
                'symbol' => 'NT$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Dominican Peso',
                'code' => 'DOP',
                'symbol' => 'RD$',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Chilean Peso',
                'code' => 'CLP',
                'symbol' => '$',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Serbian Dinar',
                'code' => 'RSD',
                'symbol' => 'RSD',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Kyrgyzstani som',
                'code' => 'KGS',
                'symbol' => 'Ð¡Ì² ',
                'precision' => '2',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
            ],
            [
                'name' => 'Iraqi Dinar',
                'code' => 'IQD',
                'symbol' => 'Ø¹.Ø¯',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Peruvian Soles',
                'code' => 'PEN',
                'symbol' => 'S/',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Moroccan Dirham',
                'code' => 'MAD',
                'symbol' => 'DH',
                'precision' => '2',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Jamaican Dollar',
                'code' => 'JMD',
                'symbol' => '$',
                'precision' => '0',
                'thousand_separator' => ',',
                'decimal_separator' => '.',
            ],
            [
                'name' => 'Macedonian Denar',
                'code' => 'MKD',
                'symbol' => 'Ð´ÐµÐ½',
                'precision' => '0',
                'thousand_separator' => '.',
                'decimal_separator' => ',',
                'swap_currency_symbol' => true,
            ],
        ];


        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};

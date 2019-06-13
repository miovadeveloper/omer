<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hastalar extends Model
{
    use SoftDeletes;

    public $table = 'hastalars';

    const SEHIR_SELECT = [
        'Adana' => 'Adana','Adiyaman' => 'Adıyaman','Afyonkarahisar' => 'Afyonkarahisar','Agri' => 'Ağrı','Aksaray' => 'Aksaray','Amasya' => 'Amasya','Ankara' => 'Ankara','Antalya' => 'Antalya','Ardahan' => 'Ardahan','Artvin' => 'Artvin','Aydin' => 'Aydın','Balikesir' => 'Balıkesir','Bartin' => 'Bartın','Batman' => 'Batman','Bayburt' => 'Bayburt','Bilecik' => 'Bilecik','Bingol' => 'Bingöl','Bitlis' => 'Bitlis','Bolu' => 'Bolu','Burdur' => 'Burdur','Bursa' => 'Bursa','Canakkale' => 'Çanakkale','Cankiri' => 'Çankırı','Corum' => 'Çorum','Denizli' => 'Denizli','Diyarbakir' => 'Diyarbakır','Duzce' => 'Düzce','Edirne' => 'Edirne','Elazig' => 'Elazığ','Erzincan' => 'Erzincan','Erzurum' => 'Erzurum','Eskisehir' => 'Eskişehir','Gaziantep' => 'Gaziantep','Giresun' => 'Giresun','Gumushane' => 'Gümüşhane','Hakkari' => 'Hakkari','Hatay' => 'Hatay','Igdir' => 'Iğdır','Isparta' => 'Isparta','Istanbul' => 'İstanbul','Izmir' => 'İzmir','Kahramanmaras' => 'Kahramanmaraş','Karabuk' => 'Karabük','Karaman' => 'Karaman','Kars' => 'Kars','Kastamonu' => 'Kastamonu','Kayseri' => 'Kayseri','Kirikkale' => 'Kırıkkale','Kirklareli' => 'Kırklareli','Kirsehir' => 'Kırşehir','Kilis' => 'Kilis','Kocaeli' => 'Kocaeli','Konya' => 'Konya','Kutahya' => 'Kütahya','Malatya' => 'Malatya','Manisa' => 'Manisa','Mardin' => 'Mardin','Mersin' => 'Mersin','Mugla' => 'Muğla', 'Mus' => 'Muş', 'Nevsehir' => 'Nevşehir', 'Nigde' => 'Niğde', 'Ordu' => 'Ordu', 'Osmaniye' => 'Osmaniye', 'Rize' => 'Rize', 'Sakarya' => 'Sakarya', 'Samsun' => 'Samsun', 'Siirt' => 'Siirt', 'Sinop' => 'Sinop', 'Sivas' => 'Sivas', 'Sanliurfa' => 'Şanlıurfa', 'Sirnak' => 'Şırnak', 'Tekirdag' => 'Tekirdağ', 'Tokat' => 'Tokat', 'Trabzon' => 'Trabzon', 'Tunceli' => 'Tunceli', 'Usak' => 'Uşak', 'Van' => 'Van', 'Yalova' => 'Yalova', 'Yozgat' => 'Yozgat', 'Zonguldak' => 'Zonguldak'
    ];


    const ESININ_ALKOL_KULLANIMI_SELECT = [
        'ko' => 'ko',
    ];

    const ESININ_SIGARA_KULLANIMI_SELECT = [
        'ko' => 'ko',
    ];

    const PMS_RADIO = [
        'Evet'  => 'Evet',
        'Hayır' => 'Hayır',
    ];

    const VIRGO_RADIO = [
        'Evet'  => 'Evet',
        'Hayır' => 'Hayır',
    ];

    const DISMENORE_RADIO = [
        'Evet'  => 'Evet',
        'Hayır' => 'Hayır',
    ];

    const AKRABA_EVLILIGI_RADIO = [
        'Evet'  => 'Evet',
        'Hayır' => 'Hayır',
    ];

    const MEDENI_DURUM_SELECT = [
        'Evli'  => 'Evli',
        'Dul'   => 'Dul',
        'Bekar' => 'Bekar',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'dogum_tarihi',
        'ilk_gelis_tarihi',
    ];

    const SOSYAL_GUVENCE_SELECT = [
        'Bağkur'         => 'Bağkur',
        'Emekli Sandığı' => 'Emekli Sandığı',
        'GSS'            => 'GSS',
        'Muhasebe'       => 'Muhasebe',
        'SGK'            => 'SGK',
        'Yeşil Kart'     => 'Yeşil Kart',
    ];

    const ESININ_SOSYAL_GUVENCE_SELECT = [
        'Bağkur'         => 'Bağkur',
        'Emekli Sandığı' => 'Emekli Sandığı',
        'GSS'            => 'GSS',
        'Muhasebe'       => 'Muhasebe',
        'SGK'            => 'SGK',
        'Yeşil Kart'     => 'Yeşil Kart',
    ];

    const KAN_GRUBU_SELECT = [
        'AB Rh (+)' => 'AB Rh (+)',
        'AB Rh (-)' => 'AB Rh (-)',
        'A Rh (+)'  => 'A Rh (+)',
        'A Rh (-)'  => 'A Rh (-)',
        'B Rh (+)'  => 'B Rh (+)',
        'B Rh (-)'  => 'B Rh (-)',
        'O Rh (+)'  => 'O Rh (+)',
        'O Rh (-)'  => 'O Rh (-)',
    ];

    const ESININ_KAN_GRUBU_SELECT = [
        'AB Rh (+)' => 'AB Rh (+)',
        'AB Rh (-)' => 'AB Rh (-)',
        'A Rh (+)'  => 'A Rh (+)',
        'A Rh (-)'  => 'A Rh (-)',
        'B Rh (+)'  => 'B Rh (+)',
        'B Rh (-)'  => 'B Rh (-)',
        'O Rh (+)'  => 'O Rh (+)',
        'O Rh (-)'  => 'O Rh (-)',
    ];

    const SIGARA_SELECT = [
        'Kullanıyor'                    => 'Kullanıyor',
        'Kullanmıyor'                   => 'Kullanmıyor',
        'Daha önce kullanmış, bırakmış' => 'Daha önce kullanmış, bırakmış',
        'Her gün 1-5 arası'             => 'Her gün 1-5 arası',
        'Her gün 5-10 arası'            => 'Her gün 5-10 arası',
        'Her gün 10-20 arası'           => 'Her gün 10-20 arası',
        'Her gün 20-40 arası'           => 'Her gün 20-40 arası',
        'Her gün 40 tan fazla'          => 'Her gün 40 tan fazla',
    ];

    const ALKOL_SELECT = [
        'Kullanıyor'                     => 'Kullanıyor',
        'Kullanmıyor'                    => 'Kullanmıyor',
        'Daha önce kullanmış, bırakmış'  => 'Daha önce kullanmış, bırakmış',
        'Ayda 1-2 kere kullanıyor'       => 'Ayda 1-2 kere kullanıyor',
        'Haftada 1-2 kere kullanıyor'    => 'Haftada 1-2 kere kullanıyor',
        'Her gün 1 büyükten fazla'       => 'Her gün 1 büyükten fazla',
        'Her gün 1 büyük - 1 ufak arası' => 'Her gün 1 büyük - 1 ufak arası',
        'Her gün 1-2 kadeh'              => 'Her gün 1-2 kadeh',
        'Her gün 3-5 kadeh'              => 'Her gün 3-5 kadeh',
    ];

    const OZEL_SIGORTA_SELECT = [
        'Mapfre Sigorta'   => 'Mapfre Sigorta',
        'Acıbadem Sigorta' => 'Acıbadem Sigorta',
        'Ak Hayat'         => 'Ak Hayat',
        'Allianz Sigorta'  => 'Allianz Sigorta',
        'Amerikan Life'    => 'Amerikan Life',
        'Anadolu Hayat'    => 'Anadolu Hayat',
        'Axa Oyak'         => 'Axa Oyak',
        'Başak'            => 'Başak',
        'Commercial'       => 'Commercial',
        'Ergo Sigorta'     => 'Ergo Sigorta',
        'Genel Sigorta'    => 'Genel Sigorta',
        'Halk Sigorta'     => 'Halk Sigorta',
        'İsviçre Hayat'    => 'İsviçre Hayat',
        'Koç Allianz'      => 'Koç Allianz',
        'Med Net'          => 'Med Net',
        'Şark Hayat'       => 'Şark Hayat',
        'Universal'        => 'Universal',
        'Yapı Kredi Yaşam' => 'Yapı Kredi Yaşam',
        'Diğer'            => 'Diğer',
    ];

    protected $fillable = [
        'gun',
        'pms',
        'gsm',
        'sure',
        'adres',
        'virgo',
        'dogum',
        'dusuk',
        'sehir',
        'alkol',
        'unvan',
        'kurtaj',
        'sigara',
        'meslek',
        'miktar',
        'ilaclar',
        'allerji',
        'yasayan',
        'e_posta',
        'gebelik',
        'derecesi',
        'uyarilar',
        'referans',
        'vergi_no',
        'dismenore',
        'kan_grubu',
        'updated_at',
        'created_at',
        'adi_soyadi',
        'deleted_at',
        'telefon_ev',
        'dogum_yeri',
        'hasta_genel',
        'menars_yasi',
        'hastaliklar',
        'dis_gebelik',
        'hasta_cocuk',
        'dogum_tarihi',
        'tc_kimlik_no',
        'operasyonlar',
        'medeni_durum',
        'ozel_sigorta',
        'vergi_dairesi',
        'esinin_eposta',
        'fatura_adresi',
        'esinin_meslegi',
        'sosyal_guvence',
        'esinin_telefonu',
        'akraba_evliligi',
        'esinin_kan_grubu',
        'ilk_gelis_tarihi',
        'esinin_adi_soyadi',
        'esinin_dogum_yeri',
        'esinin_allerjileri',
        'esinin_hastaliklar',
        'jinekolojik_anomali',
        'hasta_kategorisi_id',
        'esinin_operasyonlar',
        'esinin_dogum_tarihi',
        'esinin_sosyal_guvence',
        'esinin_alkol_kullanimi',
        'esinin_sigara_kullanimi',
        'ozgecmis_ve_soygecmis_notlari',
        'esinin_ozgecmis_ve_soygecmis_notlari',
    ];

    public function hasta_kategorisi()
    {
        return $this->belongsTo(HastaKategorileri::class, 'hasta_kategorisi_id');
    }

    public function getIlkGelisTarihiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setIlkGelisTarihiAttribute($value)
    {
        $this->attributes['ilk_gelis_tarihi'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDogumTarihiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDogumTarihiAttribute($value)
    {
        $this->attributes['dogum_tarihi'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}

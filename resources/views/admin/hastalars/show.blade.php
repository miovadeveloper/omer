@extends('layouts.admin')
@section('content')





    <div id="accordion" role="tablist">
        <div class="card mb-0">
            <div class="card-header" id="headingOne" role="tab">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">    {{ $hastalar->adi_soyadi }} Takip Listesi</a>
                </h5>
            </div>
            <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">




                        <form class="float-sm-left mr-3" action="{{ route("admin.takiplers.create") }}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="hasta_id" value="{{ $hastalar->id }}">
                            <input type="hidden" name="takip_tipi" value="gebe">

                            <input type="submit" class="btn btn-success" value="Gebe Takip Ekle">
                         </form>

                    <form class="float-sm-left mr-3" action="{{ route("admin.takiplers.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="hasta_id" value="{{ $hastalar->id }}">
                        <input type="hidden" name="takip_tipi" value="jine">

                        <input type="submit" class="btn btn-success" value="Jinekolojik Takip Ekle">
                    </form>

                    <form class="float-sm-left mr-3" action="{{ route("admin.takiplers.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="hasta_id" value="{{ $hastalar->id }}">
                        <input type="hidden" name="takip_tipi" value="infe">

                        <input type="submit" class="btn btn-success" value="İnterfinite Takip Ekle">
                    </form>

                    <div style="margin-top: 50px;"  class="float-xl-none" class="card">



                        <div class="card-header">
                            {{ trans('cruds.takipler.title_singular') }} {{ trans('global.list') }}
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-bordered table-striped table-hover datatable">
                                    <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            {{ trans('cruds.takipler.fields.takip_tipi') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.takipler.fields.hasta') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.takipler.fields.baslangic') }}
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                    @foreach($takipler as $key => $takipler)
                        <tr data-entry-id="{{ $takipler->id }}">
                            <td>

                            </td>
                            <td>
                                {{ App\Takipler::TAKIP_TIPI_SELECT[$takipler->takip_tipi] ?? '' }}
                            </td>
                            <td>
                                {{ $takipler->hasta->adi_soyadi ?? '' }}
                            </td>
                            <td>
                                {{ $takipler->baslangic ?? '' }}
                            </td>
                            <td>
                                @can('takipler_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.takiplers.show', $takipler->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('takipler_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.takiplers.edit', $takipler->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('takipler_delete')
                                    <form action="{{ route('admin.takiplers.destroy', $takipler->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>





                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingTwo" role="tab">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">    {{ $hastalar->adi_soyadi }} Tüm Bilgileri</a>
                </h5>
            </div>
            <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">




                    <div class="card-body">
                        <div>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.hasta_kategorisi') }}
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.adi_soyadi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->adi_soyadi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.tc_kimlik_no') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->tc_kimlik_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.ilk_gelis_tarihi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->ilk_gelis_tarihi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.dogum_tarihi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->dogum_tarihi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.telefon_ev') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->telefon_ev }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.gsm') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->gsm }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.e_posta') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->e_posta }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.meslek') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->meslek }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.dogum_yeri') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->dogum_yeri }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.kan_grubu') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->kan_grubu }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.referans') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->referans }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.sosyal_guvence') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->sosyal_guvence }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.ozel_sigorta') }}
                                    </th>
                                    <td>
                                        {{$hastalar->ozel_sigorta }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.medeni_durum') }}
                                    </th>
                                    <td>
                                        {{$hastalar->medeni_durum }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.adres') }}
                                    </th>
                                    <td>
                                        {!! $hastalar->adres !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.sehir') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->sehir }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_adi_soyadi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_adi_soyadi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_dogum_tarihi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_dogum_tarihi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_dogum_yeri') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_dogum_yeri }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_meslegi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_meslegi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_kan_grubu') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_kan_grubu }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_sosyal_guvence') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_sosyal_guvence }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_telefonu') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_telefonu }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_eposta') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_eposta }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.virgo') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->virgo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.pms') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->pms }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.dismenore') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->dismenore }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.akraba_evliligi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->akraba_evliligi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.derecesi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->derecesi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.jinekolojik_anomali') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->jinekolojik_anomali }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.menars_yasi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->menars_yasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.gun') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->gun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.sure') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->sure }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.miktar') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->miktar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.gebelik') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->gebelik }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.dogum') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->dogum }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.dusuk') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->dusuk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.kurtaj') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->kurtaj }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.yasayan') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->yasayan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.dis_gebelik') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->dis_gebelik }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.hastaliklar') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->hastaliklar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.operasyonlar') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->operasyonlar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.allerji') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->allerji }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.alkol') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->alkol }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.sigara') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->sigara }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.ilaclar') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->ilaclar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.ozgecmis_ve_soygecmis_notlari') }}
                                    </th>
                                    <td>
                                        {!! $hastalar->ozgecmis_ve_soygecmis_notlari !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.uyarilar') }}
                                    </th>
                                    <td>
                                        {!! $hastalar->uyarilar !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_hastaliklar') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_hastaliklar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_operasyonlar') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_operasyonlar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_allerjileri') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_allerjileri }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_alkol_kullanimi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_alkol_kullanimi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_sigara_kullanimi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->esinin_sigara_kullanimi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.esinin_ozgecmis_ve_soygecmis_notlari') }}
                                    </th>
                                    <td>
                                        {!! $hastalar->esinin_ozgecmis_ve_soygecmis_notlari !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.unvan') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->unvan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.vergi_dairesi') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->vergi_dairesi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.vergi_no') }}
                                    </th>
                                    <td>
                                        {{ $hastalar->vergi_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.fatura_adresi') }}
                                    </th>
                                    <td>
                                        {!! $hastalar->fatura_adresi !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.hasta_genel') }}
                                    </th>
                                    <td>
                                        {!! $hastalar->hasta_genel !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hastalar.fields.hasta_cocuk') }}
                                    </th>
                                    <td>
                                        {!! $hastalar->hasta_cocuk !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                Back
                            </a>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>

    </div>
</div>








@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.takiplers.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('takipler_delete')
            dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })

    </script>
@endsection

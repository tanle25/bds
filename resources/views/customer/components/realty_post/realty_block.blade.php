<div class="block realty">
    <div class="realty-container shadow-6 flex-wrap rounded d-flex d-md-block">
        <div class="overflow-hidden col-5 px-0 col-md-12 order-2 bg-white">
            <a href="{{$item->link}}"class="position-relative d-block ml-2 ml-md-0 img-wraper height-md-180 height-120">
                <img class="lazy" data-src="{{$item->thumb}}" alt="" srcset="">
                @if ($item->rank == 4)
                    <div class="hrm-ribbon-danger px-3 py-1">
                        Nổi bật
                    </div>
                @endif
                @if ($item->rank == 3)
                    <div class="hrm-ribbon-primary px-3 py-1">
                        Vip
                    </div>
                @endif
            </a>
        </div>
        <div class="order-1 col-12 bg-white px-3 pt-md-4 pt-1 pb-2 pb-md-0">
            <a href="{{$item->link}}" class="d-block font-9 main-text w-100 hrm-truncate
                @if ($item->rank == 4)
                text-danger
                @endif
                @if ($item->rank == 3)
                text-info
                @endif
                " style="font-weight: 500; max-height: 3.6em; line-height: 1.8em"
                >{{$item->title}}
            </a>
        </div>
        <div class="realty-body col-7 col-md-12  bg-white order-3 px-3 pb-3">
            <div class="font-8 pt-2">
                {{$item->realty->district->name_with_type ?? ''}}, {{$item->realty->province->name ?? ''}}
            </div>

            <div class="d-flex justify-content-between text-dark py-1 font-8 ">
                <span class="font-weight-500">
                    <i class="fas fa-dollar-sign"></i>
                    @if ($item->price_type !== 0)
                    {{ \App\Helpers\CurrencyHelper::beautyPrice($item->price)}}
                    @endif
                    {{config('constant.price_type.'. $item->price_type)['front_view']}}
                </span>
                <span class="font-weight-500"><i class="fas fa-expand"></i> {{$item->realty->area ?? ''}}m²</span>
            </div>
            <div class="font-8 d-flex justify-content-between">
                <span class="text-muted">
                    {{\App\Helpers\TimeHelper::getDateDiffFromNow($item->created_at ?? '')['string']}} truớc
                </span>
                @php
                    $is_featured = false;
                    if (Auth::user()) {
                        if($item->featured_by->contains('id', Auth::user()->id)){
                            $is_featured = true;
                        }
                    }
                @endphp
                @if ($is_featured)
                    <div data-post-id="{{$item->id ?? 1}}" class="btnlike like-heart checked">
                        <i class="fas fa-heart text-info font-12"></i>
                    </div>
                @else
                    <div data-post-id="{{$item->id ?? 1}}" class="btnlike like-heart unchecked">
                        <i class="far fa-heart text-info font-12"></i>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

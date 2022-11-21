@extends('partials.panel')
@section('page.title', 'پروژه‌ها')
@section('wrapper')
<div class="dashboard-content">
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>گزارش های {{$project->title}}</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                        <li><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li>
                            <a href="{{route('panel.projects')}}">پروژه‌ها</a>
                        </li>
                        <li> گزارش ها</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <div class="booking-requests-filter">
                    <a href="{{route('panel.report.create',['service'=>'project','uuid' => $project->uuid])}}" class="button">
                        <i class="sl sl-icon-plus"></i>ارسال گزارش</a>
                </div>
                <h4>لیست گزارش ها  {{$project->title}}</h4>
                @if(count($items) === 0)
                @include('partials.empty')
                @else
                <ul>
                    @foreach($items as $item)
                    <li class="pending-booking">
                        <div class="list-box-listing bookings">
                            <div class="list-box-listing-img">
                                @if(!$item->cover)
                                <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=120" alt="">
                                @else
                                <img src="{{getSmallUri($item->cover)}}" alt="">
                                @endif
                            </div>
                            <div class="list-box-listing-content">
                                <div class="inner">
                                    <h3>{{$item->title}}
                                    @if($item->status===0)
                                        <span class="booking-status pending">در انتظار</span>
                                    @else
                                        <span class="booking-status perpul">تایید شد</span>
                                    @endif
                                    </h3>
                                    <div class="inner-booking-list">
                                        <h5>متن: </h5>
                                        <ul class="booking-list">
                                            <li class="highlighted">{{\Str::substr($item->conten,0,100)}} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons-to-right">
                            <a href="{{route('panel.report.show', ['service'=>'project','uuid' => $project->uuid,'id' => $item->uuid])}}" class="button gray approve"><i class="sl sl-icon-pencil"></i> ویرایش</a>
                             <a href="{{route('panel.report.destroy', ['service'=>'project','uuid' => $project->uuid,'id' => $item->uuid])}}" class="button gray reject">
                                <i class="sl sl-icon-close"></i> حذف
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

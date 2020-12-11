@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Welcome to Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ asset('assets/images/user.png') }}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                        </div>
                        <div class="col-sm-8 text-right pt-5">
                            <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Monthly Activities</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mt-4 mt-sm-0" style="position: relative;">
                                <div id="radialBar-chart" class="apex-charts" style="min-height: 153.525px;"><div id="apexcharts34d8c" class="apexcharts-canvas apexcharts34d8c apexcharts-theme-light" style="width: 134px; height: 153.525px;"><svg id="SvgjsSvg1342" width="134" height="153.525" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, -10)" style="background: transparent;"><g id="SvgjsG1344" class="apexcharts-inner apexcharts-graphical" transform="translate(-10, 0)"><defs id="SvgjsDefs1343"><clipPath id="gridRectMask34d8c"><rect id="SvgjsRect1345" width="162" height="180" x="-3" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask34d8c"><rect id="SvgjsRect1346" width="158" height="180" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1352" x1="0" y1="1" x2="2" y2="2"><stop id="SvgjsStop1353" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="0"></stop><stop id="SvgjsStop1354" stop-opacity="1" stop-color="rgba(206,206,206,1)" offset="0.5"></stop><stop id="SvgjsStop1355" stop-opacity="1" stop-color="rgba(206,206,206,1)" offset="0.65"></stop><stop id="SvgjsStop1356" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="0.91"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1364" x1="0" y1="1" x2="2" y2="2"><stop id="SvgjsStop1365" stop-opacity="1" stop-color="rgba(85,110,230,1)" offset="0"></stop><stop id="SvgjsStop1366" stop-opacity="1" stop-color="rgba(72,94,196,1)" offset="0.5"></stop><stop id="SvgjsStop1367" stop-opacity="1" stop-color="rgba(72,94,196,1)" offset="0.65"></stop><stop id="SvgjsStop1368" stop-opacity="1" stop-color="rgba(85,110,230,1)" offset="0.91"></stop></linearGradient></defs><g id="SvgjsG1348" class="apexcharts-radialbar"><g id="SvgjsG1349"><g id="SvgjsG1350" class="apexcharts-tracks"><g id="SvgjsG1351" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 45.25319510297665 110.74680489702334 A 46.3109756097561 46.3109756097561 0 1 1 110.74680489702334 110.74680489702334" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="12.14865853658537" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 45.25319510297665 110.74680489702334 A 46.3109756097561 46.3109756097561 0 1 1 110.74680489702334 110.74680489702334"></path></g></g><g id="SvgjsG1358"><g id="SvgjsG1363" class="apexcharts-series apexcharts-radial-series" seriesName="SeriesxA" rel="1" data:realIndex="0"><path id="SvgjsPath1369" d="M 45.25319510297665 110.74680489702334 A 46.3109756097561 46.3109756097561 0 1 1 111.3133279486101 45.82969314856046" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1364)" stroke-opacity="1" stroke-linecap="butt" stroke-width="12.524390243902442" stroke-dasharray="4" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="181" data:value="67" index="0" j="0" data:pathOrig="M 45.25319510297665 110.74680489702334 A 46.3109756097561 46.3109756097561 0 1 1 111.3133279486101 45.82969314856046"></path></g><circle id="SvgjsCircle1359" r="35.23664634146341" cx="78" cy="78" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1360" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1361" font-family="Helvetica, Arial, sans-serif" x="78" y="138" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="regular" fill="#556ee6" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Series A</text><text id="SvgjsText1362" font-family="Helvetica, Arial, sans-serif" x="78" y="116" text-anchor="middle" dominant-baseline="auto" font-size="16px" font-weight="regular" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">67%</text></g></g></g></g><line id="SvgjsLine1370" x1="0" y1="0" x2="156" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1371" x1="0" y1="0" x2="156" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div></div></div>
                                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 135px; height: 155px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">This Month Post</p>
                                    <h4 class="mb-0">23</h4>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="bx bx-calendar font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Past Month Post</p>
                                    <h4 class="mb-0">20</h4>
                                </div>
                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-skip-previous font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Total Post</p>
                                    <h4 class="mb-0">312</h4>
                                </div>

                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-check-square font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

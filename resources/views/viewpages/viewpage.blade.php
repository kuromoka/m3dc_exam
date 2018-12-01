@extends('layouts.layoutindex')

@section('content')

	<div class="container">
		<div class="container-component">

        	<div class="pageWrap">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center"></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="description col-xs-12  col-md-12">
                                <div class="gaiyo">
                                    <p>日程:{{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_DATE') }}</p>
                                    <p>演題:{{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_TITLE') }}</p>
                                    <p>演者:{{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_PROF') }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <!-- iframe コード入力 -->
                                <iframe src="{{asset('img/m3dc_logo.png')}}" width="493" height="533"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <p class="glyphicon glyphicon-warning-sign text-danger">　PCでご視聴の場合はVPNを切断しご覧ください</p>
                    </div>
                </div>

                <div class="col-sm-12 contactBox">
                	<a target="_blank" href="{{ Config::get('defaultcfg.defaultcfg.INQUIRY_URL') }}">接続に関する技術的な質問等ございましたら、こちらからお問い合わせ下さい。</a>
            	</div>
	        </div>

        </div>
    </div>

@endsection

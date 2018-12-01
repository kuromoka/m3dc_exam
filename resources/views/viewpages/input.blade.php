@extends('layouts.layoutindex')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container-component">

                	<div class="row">
                    	<div class="description col-xs-12  col-md-12">
                        	<div class="panel panel-default">

                        		<div class="panel-heading"></div>
                        		<div class="panel-body">
                        			<div class="gaiyo">
                                    	<dl>
                                    		<dt>日程</dt>
	                                			<dd>{{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_DATE') }}</dd>
	                                			<dt>演題</dt>
	                                			<dd>{{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_TITLE') }}</dd>
	                                			<dt>演者</dt>
	                                			<dd>{{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_PROF') }}</dd>
                                    	</dl>
                                    </div>
                        		</div>

                        	</div>
                    	</div>
                	</div>

                	<div class="row">
                        <div class="description col-xs-12  col-md-12">
                            <div class="panel panel-primary">
                            	<div class="panel-heading"></div>
                        		<div class="panel-body">

                        			<form id="nameForm" class="form-horizontal" role="form" method="post" action="/displayview">
										{{ csrf_field() }}
                            			<div class="form-group">
                            				<label class="col-md-2 control-label" >都道府県</label>
                            					<div class="col-md-4">
                                					<select name="todohuken" id="todohuken" class="form-control">
                                					<option value="msg" selected="selected" class="msg">都道府県</option>
													<option value="1" class="msg">東京都</option>
                            						</select>
                    							</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" >ご氏名</label>
                            					<div class="col-md-4">
                                					<input type="text" name="fname" id="fname" class="form-control">
                    							</div>
                            					<div class="col-md-4">
                                					<input type="text" name="lname" id="lname" class="form-control">
                    							</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" >参加人数</label>
                            					<div class="col-md-4">
                                					<input type="number" name="viewcnt" id="viewcnt" class="form-control">
                    							</div>
										</div>

    														<div class="row">
		                              <div class="btn-group btn-group-justified">
		                                  <label class="col-xs-2 col-md-2"></label>
		                                  <div class="col-xs-12 col-md-8">
		                                      <button type="submit" class="btn btn-primary btn-group-justified" name="submitlang" value="jp">視聴する</button>
		                                  </div>
		                              </div>
		                          	</div>

        											</form>

                        		</div>
                        	</div>
                    	</div>
                	</div>

                </div>
            </div>
        </div>
    </div>
@endsection

@extends('backend/modules/master')
@section('content')
<h1>Articles</h1>  
<div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Articles Category List</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                   <a href="{{URL::to(PREFIX.'articles/pages/category/add')}}"><button type="button" class="btn btn-sm btn-primary btn-create">Create New</button></a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">S.N.</th>
                        <th>Title</th>
                        <th>Slug</th>
                    </tr> 
                  </thead>
                  <tbody>
                   			@php 
	            			$counter = 0;
	            			@endphp
                           @foreach($articleCategoryData as $data)
                           <?php $counter++;?>
                          <tr>
                            <td align="center">
                              <a class="btn btn-default" href="{{ URL::to(PREFIX.'articles/pages/category/edit')}}?id={{ $data->id }}"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger" href="{{URL::to(PREFIX.'articles/pages/category/delete')}}?id= {{ $data->id }}" onClick="Javascript: return confirm('Are you sure you want to delete?')"><em class="fa fa-trash"></em></a>
                            </td>
                            <td class="hidden-xs"><?php echo $counter;?></td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->slug }}</td>
                          </tr>
                           @endforeach
                        </tbody>
                </table>
            
              </div>
              <!-- <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div> -->
            </div>
@stop
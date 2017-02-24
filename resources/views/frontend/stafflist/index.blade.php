@extends('frontend.layouts.master')
@section('title', 'NPHL :: Staff List')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    <style>
        #map {
            width: 100%;
            height: 400px;
        }
        .single_doc_item:hover {
            cursor: pointer;
        }
        .staff_item:hover {
            cursor: pointer;
        }
    </style>
@stop
@section('body')

<div class="container">
   <ol class="breadcrumb" style="background: none;">
        <li>
         <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Home</a>
        </li>
        @for($i = 1; $i <= count(Request::segments()); $i++)
              
            <li>
              @if($i == 1)
                <a href="{{url('/')}}/stafflist">{{ ucfirst(Request::segment($i)) }}</a>
              @else
                {{ ucfirst(Request::segment($i)) }}
              @endif
              @if($i < count(Request::segments()) & $i > 1)
                {!!'<i class="fa fa-angle-right"></i>'!!}
              @endif
            </li>
        @endfor
    </ol>
</div>
 <section class="doc_page">
   <!--Start of StaffList Body -->
   <div class="container">
        @if(!$dept)
            @foreach($division as $dept)
              <div class="row">
                <div class="col-md-12">
                  <div class="doc_title">
                    <h2 class="sec_Hd" style="color:#0277bd">{{$dept->name}}</h2>
                  </div>
                </div>
              </div>
             <!--Start of tab -->
               <div class="row">
                  <div class="all_doctor_item">
                    @if(empty($staff->getStaffall($dept->id)))
                          <div class="col-xs-12 col-sm-6 col-md-3 mix">
                              <figcaption>
                                <em>No data Available.</em>
                              </figcaption> 
                          </div>
                    @else
                        @foreach ($staff->getStaffall($dept->id) as $key => $staffs)
                            @if($staffs->view_photo == 1)
                                <div class="col-xs-6 col-sm-3 col-md-2 mix">
                                      <div class="single_doc_item">
                                      <!--Card-->
                                        <div class="card card-cascade ">
                                          <figure class="pop" pageTitle="{{$staffs->name}}" pageDesignation="{{$staffs->designation}}" pageDescription="{{$staffs->desc}}">
                                                @if(count($images->getImage('Staffmanagement',$staffs->id)) > 0 )
                                                    @foreach($image as $images)
                                                       @if($images->imageable_type === 'Staffmanagement' && $images->imageable_id == $staffs->id )
                                                         <img class="dynamic_image" src="{{ asset($images->thumbnail(140,196)) }}"  alt="" pageImage="{{ asset($images->thumbnail(140,196)) }}" />
                                                       @endif
                                                    @endforeach                                            
                                                @else 
                                                    <img class="dynamic_image" src="{{ asset($images->placeholder(140,196,"staff")) }}"  alt="" pageImage="{{ asset($images->placeholder(140,196,"staff")) }}" />
                                                @endif
                                                <figcaption style="margin-right: 7px;">
                                                    <h4><strong>{{$staffs->name}}</strong></h4><br>
                                                    <h5><strong>{{$staffs->designation}}</strong></h5>
                                                </figcaption>
                                          </figure>
                                        </div>
                                      </div>
                                </div>
                            @else
                                <div class="col-xs-6 col-sm-3 col-md-2 mix pop staff_item" pageTitle="{{$staffs->name}}" pageDesignation="{{$staffs->designation}}" pageDescription="{{$staffs->desc}}">
                                  {{-- <div class="col-md-1">
                                      <h4  style="color: #0277bd;">{{$key+1}}.</h4>
                                  </div>
                                  <div class="col-md-11">
                                  </div> --}}
                                      <h4 style="color: #0277bd;"><strong>{{$staffs->name}}</strong></h4>
                                      <h5 style="color: #e53935;">{{$staffs->designation}}</h5>
                                </div>
                            @endif
                        @endforeach
                    @endif
                  </div>    
               </div>
            @endforeach

        @else

          <div class="col-md-12">
            <div class="doc_title">
              <h2 class="sec_Hd" style="color:#0277bd">{{$divisions->getNameDivision($dept) }}</h2>
            </div>
          </div>
      
            <div class="row">
                    <div class="all_doctor_item">
                        @if(empty($staff->getStaff($dept)))
                          <div class="col-xs-12 col-sm-6 col-md-4 mix">
                              <figcaption>
                                <em>No data Available.</em>
                              </figcaption> 
                          </div>
                        @else
                            @foreach ($staff->getStaff($dept) as $key => $staffs)
                                @if($staffs->view_photo == 1)
                                   <div class="col-xs-6 col-sm-3 col-md-2 mix">
                                          <div class="single_doc_item">
                                          <!--Card-->
                                            <div class="card card-cascade ">
                                                <figure class="pop" pageTitle="{{$staffs->name}}" pageDesignation="{{$staffs->designation}}" pageDescription="{{$staffs->desc}}">
                                                    @if(count($images->getImage('Staffmanagement',$staffs->id)) > 0 )
                                                      @foreach($image as $images)
                                                       @if($images->imageable_type === 'Staffmanagement' && $images->imageable_id == $staffs->id )
                                                         <img class="dynamic_image" src="{{ asset($images->thumbnail(140,196)) }}"  alt="" pageImage="{{ asset($images->thumbnail(140,196)) }}" />
                                                       @endif
                                                      @endforeach                                            
                                                    @else 
                                                        <img class="dynamic_image" src="{{ asset($images->placeholder(140,196,"staff")) }}"  alt="" pageImage="{{ asset($images->placeholder(140,196,"staff")) }}" />
                                                    @endif
                                                    <figcaption>
                                                        <h4>{{$staffs->name}}</h4><br>
                                                        <h5>{{$staffs->designation}}</h5> 
                                                    </figcaption>
                                                </figure> 
                                            </div>
                                          <!--Card End-->
                                          </div>  
                                   </div>
                               @else
                                  <div class="col-xs-6 col-sm-3 col-md-2 mix pop staff_item" pageTitle="{{$staffs->name}}" pageDesignation="{{$staffs->designation}}" pageDescription="{{$staffs->desc}}">
                                    {{-- <div class="col-md-1">
                                        <h4  style="color: #0277bd;">{{$key+1}}.</h4>
                                    </div>
                                    <div class="col-md-10">
                                    </div> --}}
                                        <h4 style="color: #0277bd;"><strong>{{$staffs->name}}</strong></h4>
                                        <h5 style="color: #e53935;">{{$staffs->designation}}</h5>
                                  </div>
                              @endif
                            @endforeach
                        @endif
                    </div>    
                </div>
        @endif     
   </div>
 </section>

<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        {{-- <div class="modal-header">
          <h4 class="modal-title">Staff Detail</h4>
        </div> --}}
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="row">
          <div class="col-md-12">
            <div class="col-sm-5" style="border-right: 1px solid #e5e5e5;">
              <div class="logowrapper">
                <img class="logoicon modal_img" src="" alt="App Logo"  />
              </div>
            </div>
            <div class="col-sm-7 staff_detail">
            </div>
          </div>
        </div>
          
          
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop

@section('footer')
<script>
  $(function() {
        $(".pop").click(function(){
          $(".modal .modal-body .col-sm-5").hide();
          var pageImage =$(this).find(".dynamic_image").attr('pageImage');
          var pageTitle = $(this).attr('pageTitle');
          if(pageImage != null){
            $(".modal .modal-body .col-sm-5").show();
          }
          var pageDesignation = $(this).attr('pageDesignation');
          var pageDescription = $(this).attr('pageDescription');
          if(pageImage != null){
          $(".modal .modal-body .logoicon").attr("src",pageImage);
          }
          $(".modal .modal-body .staff_detail").html("<p><strong>Name : </strong>"+pageTitle+"</p><p><strong>Designation : </strong>"+pageDesignation+"</p><p><strong>Qualification & Specialization :</strong></p><p>"+pageDescription+"</p>")
          $(".modal").modal("show");
        });
  }); 

</script>
   
@stop

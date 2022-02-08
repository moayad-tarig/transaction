@extends('layouts.app')

@section('content')
    <div class="container-fluid">



        @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif












        <form role="form" action="{{ route('transaction.store') }}" class="AddProd" encType="multipart/form-data" method="POST">
            @csrf
            <fieldset class="scheduler-border">
                 <legend class="scheduler-border">بيــانات الطـــلب:</legend>
                     <div class="row">
                            
                          <div class="col-lg-4">
                                <div class="form-group input-group">                                  
                                    <input type="text" class="form-control" name="name"   placeholder="اسم المرسل " required >
                                      <span class="input-group-addon"><i class="fa fa-paper-plane-o"></i></span>
                                </div>
                            </div>
            
                            <div class="col-lg-4">
                                <div class="form-group input-group">                                    
                                    <input type="text" class="form-control" name="phone_number" placeholder="رقم هاتف المرسل"  required>
                                </div>
                            </div>
                             <div class="col-lg-4">
                                <div class="form-group input-group">                                  
                                    <input type="text" class="form-control" name="resiver_name"   placeholder="اسم  المستقبل  / المستلم  " required >
                                </div>
                            </div>
                            </div>  
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group input-group">                                    
                                    <input type="text" class="form-control" name="resiver_number" placeholder="رقم هاتف المستقبل / المستلم "  required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="form-group input-group"> 
                                  <select class="form-control" class="deselection" name="location"  id="To_id">
                                   <option value="0" selected> اختر الوجهة  </option>
                                                        
                                             @foreach ($locations as $location)
                                                 <option value="{{ $location->area }}"> {{ $location->area }}</option>
                                            @endforeach
                                          
                                      
                               </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group input-group">                                  
                                    <input type="text" class="form-control" name="total"   placeholder="صافي المبلغ " required >
                                </div>
                            </div>
                            </div> 
                             <div class="row">
                            
                          
            
                            <div class="col-lg-4">
                                <div class="form-group input-group">                                    
                                    <input type="text" class="form-control" name="commission" placeholder="العمولة "  required>
                                </div>
                            </div>
                             <div class="col-lg-4">
                                <div class="form-group input-group">                                    
                                    <input type="text" class="form-control" name="reason" placeholder="سبب التحويل "  >
                                </div>
                            </div>
                               <div class="col-lg-4">
                                <div class="form-group input-group">                                    
                                     <textarea  class="form-control" name="note"  placeholder="ملاحــــظة"  ></textarea>
                                </div>
                            </div>
                            </div>  
                        <button class="btn btn-primary" type="submit"  style="margin-left:300px;font-size: large;">إرسال</button>
                      

                                  </fieldset>
                              </form>


                              <hr>
                              <legend class="scheduler-border">قائمة الصادر :</legend>
                              <table class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="GetDatatable_info" style="direction:ltr;" id="GetDatatable2">
                              <thead>
                                <tr>
                                <th >حالة الطلب  </th> 
                                <th >ملاحظة </th> 
                                <th >العمولة </th> 
                                <th >المبلغ </th> 
                                <th >الوجهة </th> 
                                <th >هاتف المستقبل  </th> 
                                <th > إسم المستقبل </th> 
                                <th >هاتف المرسل   </th> 
                                <th >إسم  المرسل </th> 
                                 <th>#   </th>
                               </tr>
                                </thead>
                                
                                    @foreach($transactions as $trans)
                                    <tr>
                                        <td>استلم</td>
                                        <td>{{ $trans->note }}</td>
                                        <td>{{ $trans->commission }}</td>
                                        <td>{{ $trans->total }}</td>
                                        <td>{{ $trans->location }}</td>
                                        <td>{{ $trans->resiver_number }}</td>
                                        <td>{{ $trans->resiver_name }}</td>
                                        <td>{{ $trans->phone_number }}</td>
                                        <td>{{ $trans->name }}</td>
                                        <td>1</td>
                                    </tr>
                                    @endforeach
                                
                              </table>
    </div>
@endsection

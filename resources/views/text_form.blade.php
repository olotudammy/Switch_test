 {!! Form::open(['route' => 'text_form', 'method'=>'POST', 'files' => true]) !!}
                            {{ csrf_field() }}

                    <div class="messages"></div>

                    <div class="controls">

                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="myMessage" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send" value="Send message">
                            </div>
                        </div>
                        
                    </div>

                {!! Form::close() !!}

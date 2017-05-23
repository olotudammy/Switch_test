<html>
<head>
    <title>Contact Form Tutorial by Bootstrapious.com</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">

                <h1>Fill the form</h1> <br>

                <h2><a href="{{ route('home')}}">profile</a></h2>

               

                <!-- We're going to place the form here in the next step -->
               

                {!! Form::open(['route' => 'pro_email', 'method'=>'POST', 'files' => true]) !!}
                            {{ csrf_field() }}

                    <div class="messages"></div>

                    <div class="controls">

                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Message *</label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>


                            <label for='to'> To Email</label>
                            <input type="text" name="to">

                            <br><br>



                             {!! Form::label('attach', 'ATTACH IMAGE') !!}
                                {!! Form::file('attach_file') !!} 


                                <br>



                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send" value="Send message">
                            </div>
                        </div>
                        
                    </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="validator.js"></script>
    <script src="contact.js"></script>
</body>
</html>
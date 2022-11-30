@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('formstyles.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   
</script>
<script src="{{asset('countrycode.js')}}"></script>

@section('content')
<!-- <img src="{{ asset('loader.gif') }}" id="gif" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"> -->

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="box-shadow padding-20 col-11 col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center   mt-3 mb-2">
            <div class=" px-0 pt-4 pb-0 mt-3 mb-3">

                <img src="/logo.png" class="logo" />
                <h2 id="heading">Employer Form </h2>
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <form id="form360" class="employerformside" action="{{route('admin.employerform.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- progressbar -->

                    <ul id="progressbar">
                        <li class="active" id="account"><strong>SBS</strong></li>
                        <li id="personal"><strong>NOMINATION</strong></li>
                        <li id="payment"><strong>LABOUR MARKET TESTING</strong></li>
                        <li id="payment"><strong>For Job </strong></li>
                    </ul>

                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    @if(Auth::user()->hasRole('consultant'))
                    <a id="correctemail" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px; display:none;">Send Correction Email</a>
                    @endif
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="cmd" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif
                    
                    @include('backend.forms.employerform.sbs')
                    @include('backend.forms.employerform.nomination')
                    @include('backend.forms.employerform.labour')
                    @include('backend.forms.employerform.job')

                    @include('backend.forms.employerform.final')



                </form>
            </div>
        </div>
    </div>
</div>
@if(Session::has('submitted'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Successfully Submitted!',
        text: 'Thank you, your application has been successfully submitted. Login details have been sent to your glistereded email to either login again and change or details or to change what has been submitted.',

    }).then((result) => {
        //window.location = '/login';
    })
</script>
@endif
<script>
    //alert('adsd');
    jQuery(document).ready(function() {
       

        var counter = 0;
        jQuery('#form360 tr td:nth-child(1)').each(function (){
            counter++;
            jQuery(this).prepend(' ( '+counter+' ) ');
        })
        
        if (jQuery('body').hasClass('admin') || jQuery('body').hasClass('consultant')) {
            jQuery('#form360 input').prop('disabled', true);
            jQuery('#form360 input').css('opacity', 0.5);
            jQuery('#form360 select').prop('disabled', true);
            jQuery('#form360 select').css('opacity', 0.5);
            jQuery('#form360 input.next').prop('disabled', false);
            jQuery('#form360 input.next').css('opacity', 1);
            jQuery('#form360 input.previous').prop('disabled', false);
            jQuery('#form360 input.previous').css('opacity', 1);
        }

        jQuery('body.client #fieldsetfour .next').val('Submit');
    })

    //remove selected duplicate value from all select tags
    $("select option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
</script>
<script src="{{asset('employerform.js')}}"></script>
<script>
    var fieldsname = [];
    var fieldsvalue = [];
    var fieldscomments = [];
    <?php if (auth()->user()->hasRole('consultant')) {  ?>
        jQuery('.form-card td:nth-child(1)').click(function(e) {

            if ($(this).hasClass('addBorder')) {
                $(this).removeClass('addBorder');
                //jQuery(this).parent('tr').find('input.commentfield').remove();

                //fieldsname.remove(jQuery(this).parent('tr').find('input.commentfield').val()); // for remove index name
                console.log('remove', jQuery(this).parent('tr').children('input.commentfield'));

                jQuery(this).parent('tr').children('input.commentfield').remove();
                //  fieldsname.remove(jQuery(this).closest('tr').find('td').text().trim());
                //   fieldsvalue.remove(jQuery(this).closest('tr').find('input').val());
                //   fieldscomments.remove(jQuery(this).val());


                if ($('.commentfield').length < 1) {
                    $('#correctemail').hide();
                }
            } else {
                console.log('add', jQuery(this).closest('tr').find('td').text().trim());
                $(this).addClass('addBorder');
                $(this).parent('tr').children('td:last-child').after('<input type="text" name="test" class="commentfield" placeholder="Enter Comments"/>');

                if ($('.commentfield').length > 0) {
                    $('#correctemail').show();
                }

                var title = jQuery(this).closest('tr').find('th').text();
                var value = jQuery(this).closest('tr').find('td').text();

            }
        });
    <?php } ?>

    jQuery('#correctemail').click(function(e) {

        e.preventDefault();
        $("#correctemail").html("Please wait...");
        //$(this).attr('disabled', 'true');
        // console.log('fields to email' , fieldsname);
        // console.log('fields to email' , fieldsvalue);
        console.log('fields to fieldscomments', $('.commentfield'));
        $('.commentfield').each(function(i, obj) {
            // console.log('th',jQuery(this).closest('tr').find('td').text());
            // console.log('td' ,jQuery(this).closest('tr').find('td').text());
            // console.log('td' ,jQuery(this).val());
            fieldsname.push(jQuery(this).closest('tr').find('td:nth-child(1)').text().trim());
            if (jQuery(this).closest('tr').find('td:nth-child(2)').children().get(0).tagName == 'INPUT') {
                fieldsvalue.push(jQuery(this).closest('tr').find('input').val());
            } else if (jQuery(this).closest('tr').find('td:nth-child(2)').children().get(0).tagName == 'SELECT') {
                fieldsvalue.push(jQuery(this).closest('tr').find('select').val());
            }
            fieldscomments.push(jQuery(this).val());

        });
        var userid = "<?php echo (!empty($_GET['userid'])) ? $_GET['userid'] : '';  ?>";



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{route('admin.correctionemail')}}",
            data: {
                userid: userid,
                formName: 'Employer Form',
                fieldsname: fieldsname,
                fieldsvalue: fieldsvalue,
                fieldscomments: fieldscomments
            },
            success: function(data) {
                $("#correctemail").html("Send Correction email");
                if (data.success === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully sent',
                        text: 'Correction Email has been sent!',
                    }).then(function() {
                        window.location.href = '/admin';
                    });
                } else if (data.success === 'false') {
                    $("#correctemail").html("Send Correction email");


                }
            }
        });
        console.log('feildsname', fieldsname);
        console.log('fieldsvalue', fieldsvalue);
        console.log('fieldscomments', fieldscomments);


    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>  
    jQuery('#cmd').on('click', function(){
        jQuery(this).text('Generating...');
        jQuery(this).prop('disabled',true);
        jQuery(this).css('pointer-event','none');
        var set1 = document.getElementById('fieldsetone');
        var set2 = document.getElementById('fieldsettwo');
        var set3 = document.getElementById('fieldsetthree');
        var set4 = document.getElementById('fieldsetfour');
        var opt = {
        margin:       10,
        filename:     'SBS.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
        var opt2 = {
        margin:       10,
        filename:     'NOMINATION.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
        var opt3 = {
        margin:       10,
        filename:     'LABOUR-MARKETING.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
        var opt4 = {
        margin:       10,
        filename:     'JOB.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };

        // New Promise-based usage:
        var one = html2pdf().set(opt).from(set1).save();
        setTimeout(function () {
        var two = html2pdf().set(opt2).from(set2).save();
        } , 2000);
        setTimeout(function () {
        var three = html2pdf().set(opt3).from(set3).save();
        } , 3000);
        setTimeout(function () {
         var four = html2pdf().set(opt4).from(set4).save();
        } , 4000);
        // jQuery(this).removeAttr('disabled');
        // jQuery(this).text('Generate PDF');
        
    })
    
 </script>
@endsection()

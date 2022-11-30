@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('formstyles.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="box-shadow padding-20 col-11 col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center   mt-3 mb-2">
            <div class=" px-0 pt-4 pb-0 mt-3 mb-3">

                <img src="/logo.png" class="logo" />
                <h2 id="heading">Form 360 </h2>
                @if(session()->has('success'))
                <div class="alert alert-success ">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <form id="form360" class="form360side" action="{{route('admin.form360.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="matrix"><strong>Matrix</strong></li>
                        <li id="personal"><strong>Personal</strong></li>
                        <li id="first_education"><strong>First Education INFO</strong></li>
                        <li id="higher_education"><strong> Higher Education </strong></li>
                        <li id="aprenticeship"><strong>Aprenticeship</strong></li>
                        <li id="workexperience"><strong>Work Experience</strong></li>
                        <li id="workexperienceintracompany"><strong>Work Experience Intra Company </strong></li>
                        <li id="visahistory"><strong>Visa History</strong></li>
                        <li id="travelhistory"><strong>Travel History</strong></li>
                        <li id="countriesofresidence"><strong>Countries of Residence</strong></li>
                        <li id="healthdeclaration"><strong>Health Declaration</strong></li>
                        <li id="healthquestion"><strong>Health Question</strong></li>
                        <li id="character"><strong>Character</strong></li>
                        <li id="familymembers"><strong>Family Members</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    @if(Auth::user()->hasRole('consultant'))
                    <a id="correctemail" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px; display:none;">Send Correction Email</a>
                    @endif

                    

                    @include('backend.forms.form360.matrix')
                    @include('backend.forms.form360.personal')
                    @include('backend.forms.form360.firsteducation')
                    @include('backend.forms.form360.highleveleducation')
                    @include('backend.forms.form360.aprenticeship')
                    @include('backend.forms.form360.workexperience')
                    @include('backend.forms.form360.workexperienceIntraCompany')
                    @include('backend.forms.form360.visahistory')
                    @include('backend.forms.form360.travelhistory')
                    @include('backend.forms.form360.countriesofresidence')
                    @include('backend.forms.form360.healthdeclaration')
                    @include('backend.forms.form360.healthquestion')
                    @include('backend.forms.form360.character')
                    @include('backend.forms.form360.familymembers')
                    @include('backend.forms.form360.final')


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
<script src="{{asset('form360.js')}}"></script>
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
    })

    //remove selected duplicate value from all select tags
    $("select option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
</script>
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
        //console.log('fields to fieldscomments' , $('.commentfield'));
        $('.commentfield').each(function(i, obj) {
            // console.log(jQuery(this).closest('tr').find('td:nth-child(2)'));
            // console.log(jQuery(this).closest('tr').find('td:nth-child(2)').children());
            // console.log(jQuery(this).closest('tr').find('td:nth-child(2)').children().get(0).tagName);
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
                formName: 'Form 360',
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
    jQuery('#pdfmatrix').on('click', function(){
        jQuery(this).text('Generating...');
        var set1 = document.getElementById('fieldsetone');
        var opt = {
        margin:       10,
        filename:     'MATRIX.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var one = html2pdf().set(opt).from(set1).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfpersonal').on('click', function(){
        jQuery(this).text('Generating...');
        var set2 = document.getElementById('fieldsettwo');
        var opt2 = {
        margin:       10,
        filename:     'PERSONAL.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var two = html2pdf().set(opt2).from(set2).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdffirst_education').on('click', function(){
        jQuery(this).text('Generating...');
        var set3 = document.getElementById('fieldsetthree');
        var opt3 = {
        margin:       10,
        filename:     'FIRST-EDUCATION.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var two = html2pdf().set(opt3).from(set3).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfhighleveleducation').on('click', function(){
        jQuery(this).text('Generating...');
        var set4 = document.getElementById('fieldsetfour');
        var opt4 = {
        margin:       10,
        filename:     'HIGHER-EDUCATION.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var four = html2pdf().set(opt4).from(set4).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfapprenticeship').on('click', function(){
        jQuery(this).text('Generating...');
        var set5 = document.getElementById('fieldsetfive');
        var opt5 = {
        margin:       10,
        filename:     'APPRENTICESHIP.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var five = html2pdf().set(opt5).from(set5).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfworkhistory').on('click', function(){
        jQuery(this).text('Generating...');
        var set6 = document.getElementById('fieldsetsix');
        var opt6 = {
        margin:       10,
        filename:     'WORK-EXPERIENCE.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var six = html2pdf().set(opt6).from(set6).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfworkexpintra').on('click', function(){
        jQuery(this).text('Generating...');
        var set7 = document.getElementById('fieldsetseven');
        var opt7 = {
        margin:       10,
        filename:     'WORK-EXPERIENCE-INTRACOMPANY.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var seven = html2pdf().set(opt7).from(set7).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfvisahistory').on('click', function(){
        jQuery(this).text('Generating...');
        var set8 = document.getElementById('fieldseteight');
        var opt8 = {
        margin:       10,
        filename:     'VISA-HISTORY.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var eight = html2pdf().set(opt8).from(set8).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdftravel').on('click', function(){
        jQuery(this).text('Generating...');
        var set9 = document.getElementById('fieldsetnine');
        var opt9 = {
        margin:       10,
        filename:     'TRAVEL-HISTORY.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var nine = html2pdf().set(opt9).from(set9).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfcountryofresidence').on('click', function(){
        jQuery(this).text('Generating...');
        var set10 = document.getElementById('fieldsetten');
        var opt10 = {
        margin:       10,
        filename:     'COUNTRY-OF-RESIDENCE.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var ten = html2pdf().set(opt10).from(set10).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfhealthdeclaration').on('click', function(){
        jQuery(this).text('Generating...');
        var set11 = document.getElementById('fieldseteleven');
        var opt11 = {
        margin:       10,
        filename:     'HEALTH-DECLARATION.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var eleven = html2pdf().set(opt11).from(set11).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfhealthquestion').on('click', function(){
        jQuery(this).text('Generating...');
        var set12 = document.getElementById('fieldsettwelve');
        var opt12 = {
        margin:       10,
        filename:     'HEALTH-QUESTION.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var twelve = html2pdf().set(opt12).from(set12).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdfcharacter').on('click', function(){
        jQuery(this).text('Generating...');
        var set13 = document.getElementById('fieldsetthirteen');
        var opt13 = {
        margin:       10,
        filename:     'CHARACTER.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var thirteen = html2pdf().set(opt13).from(set13).save();
        jQuery(this).text('Generate Pdf');
    })
    jQuery('#pdffamilymember').on('click', function(){
        jQuery(this).text('Generating...');
        var set14 = document.getElementById('fieldsetfourteen');
        var opt14 = {
        margin:       10,
        filename:     'FAMILY-MEMBERS.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 ,logging: true, dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { avoid: 'tr'}
        };
           // New Promise-based usage:
        var fourteen = html2pdf().set(opt14).from(set14).save();
        jQuery(this).text('Generate Pdf');
    })
  

     

        
        
        
        // var three = html2pdf().set(opt3).from(set3).save();

        //  var four = html2pdf().set(opt4).from(set4).save();
      
        // var five = html2pdf().set(opt5).from(set5).save();
        
        // var six = html2pdf().set(opt6).from(set6).save();
      
        
        // var seven = html2pdf().set(opt7).from(set7).save();
    
        //  var eight = html2pdf().set(opt8).from(set8).save();
      
        // var nine = html2pdf().set(opt9).from(set9).save();
        
        // var ten = html2pdf().set(opt10).from(set10).save();
     
        
        // var eleven = html2pdf().set(opt11).from(set11).save();
       
        
        //  var twelve = html2pdf().set(opt12).from(set12).save();
        //  var fourteen = html2pdf().set(opt14).from(set14).save();
        // var thirteen = html2pdf().set(opt13).from(set13).save();
        
    
       
        
    
    
 </script>

@endsection()
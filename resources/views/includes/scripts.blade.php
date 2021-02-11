{{-- ONLINE SCRIPT --}}
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
{{-- <script src="assets/js/main.js"></script> --}}

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
{{-- <script src="assets/js/init/weather-init.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
{{-- <script src="assets/js/init/fullcalendar-init.js"></script> --}}


{{-- LOCAL SCRIPT --}}
{{-- <!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.matchHeight.min.js') }}"></script> --}}
<script src="{{ asset("assets/js/main.js") }}"></script>

<!--  Chart js -->
{{-- <script src="{{ asset("assets/js/Chart.bundle.min.js") }}"></script> --}}

<!--Chartist Chart-->
{{-- <script src="{{ asset('assets/js/chartist.min.js') }}"></script>
<script src="{{ asset("assets/js/chartist-plugin-legend.min.js") }}"></script>

<script src="{{ asset("assets/js/jquery.flot.min.js") }}"></script>
<script src="{{ asset("assets/js/jquery.flot.pie.min.js") }}"></script>
<script src="{{ asset("assets/js/jquery.flot.spline.min.js") }}"></script>

<script src="{{ asset("assets/js/jquery.simpleWeather.min.js") }}"></script> --}}
<script src="{{ asset("assets/js/init/weather-init.js") }}"></script>

{{--<script src="{{ asset("assets/js/moment.min.js") }}"></script>
<script src="{{ asset("assets/js/fullcalendar.min.js") }}"></script> --}}
<script src="{{ asset("assets/js/init/fullcalendar-init.js") }}"></script>
<script src="{{ asset("assets/js/ckeditor.js") }}"></script>


<!--Local Stuff-->
<script>
    (function($){
        // DEBUG BUTTON
        $(".debug-btn").click(function () {
            console.log('bisa');
        })

        // Load data to Modal body Using JQuery
        $(".content .open-modal").click(function () {
            var link = $(this).attr("data-remote");
            // console.log(link);
            $(".modal-body").empty();
            // Adding spinner while getting data
            $(".modal-body").append("<div class='d-flex align-items-center'> <h5 class='text-secondary'>loading...</h5> <div class='spinner-grow text-primary ml-auto' role='status' aria-hidden='true'></div> </div>");
            setTimeout(function() {
                $(".modal-body").empty();
                $(".modal-body").load(link);
            }, 1500);
        });
        // End Modal

        // CKE EDITOR
        ClassicEditor.create(document.querySelector('.ckeditor'))
            .catch(error => {
                console.log(error);
            });

    })(jQuery);
</script>
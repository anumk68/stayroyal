<!-- Bootstrap bundle JS -->
<script src="{{ asset('public/admin/assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('public/admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/pace.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<!-- App Scripts -->
<script src="{{ asset('public/admin/assets/js/app.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/index.js') }}"></script>

<!-- Init PerfectScrollbar -->
<script>
    new PerfectScrollbar(".best-product");
    new PerfectScrollbar(".top-sellers-list");
</script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'numberedList', 'bulletedList', '|',
                    'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    'undo', 'redo', 'imageUpload' // Ensure 'imageUpload' is included
                ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
               
                mediaEmbed: {
                    previewsInData: true
                }
            })
            .then(editor => {
                console.log('Editor initialized successfully.', editor);
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });
    });
    </script>
</body>

</html>
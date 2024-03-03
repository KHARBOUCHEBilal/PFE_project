@section('javascript')
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "language": {
                    "lengthMenu": "Afficher _MENU_ élément par page",
                    "zeroRecords": "Nous n'avons rien trouvé - désolé",
                    "info": "Voir la page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Il n'ya pas d'élément",
                    "infoFiltered": "(page _MAX_ Toutes les pages)",
                    "search": "Chercher:",
                    "oPaginate": {
                        "sFirst": "Premièr",
                        "sNext": "Suivant",
                        "sPrevious": "Précédente",
                        "sLast": "Dernier"
                    },
                },
                "scrollX": true,
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection

{{-- 
@section('javascript')
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "language": {
                    "lengthMenu": "عرض _MENU_ عنصر في كل صفحة",
                    "zeroRecords": "لم نجد اي شيء - معذرة",
                    "info": "عرض الصفحة _PAGE_ من _PAGES_",
                    "infoEmpty": "ليس هناك اي عنصر",
                    "infoFiltered": "(الصفحة _MAX_ كل الصفحات)",
                    "search": "البحث:",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sNext": "التالي",
                        "sPrevious": "السابق",
                        "sLast": "الأخير"
                    },
                },
                "scrollX": true,
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection --}}

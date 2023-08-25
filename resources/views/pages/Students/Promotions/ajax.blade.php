
@include('pages.Students.Ajax.ajax1')

<script>
    $(document).ready(function() {
        $('select[name="Grade_id_new"]').on('change', function() {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: '/student/ajax_get_classroom/' + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Classroom_id_new"]').empty();
                        $.each(data, function(key, value) {
                            console.log(value);
                            console.log(key.ar);
                            $('select[name="Classroom_id_new"]').append(
                                '<option value="' + value + '">' + key +
                                '</option>');
                        });
                    }
                });
            } else {
                $('#class').empty();
                console.log("bad");
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('select[name="Classroom_id_new"]').on('change', function() {
            var classroom_id = $(this).val();


            if (classroom_id) {
                $.ajax({
                    url: '/student/ajax_get_sections/' + classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="section_id_new"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="section_id_new"]').append(
                                '<option value="' + value + '">' + key +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="section_id_new"]').empty();
                console.log("bad");
            }
        });
    });
</script>

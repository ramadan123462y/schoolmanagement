<script>
    $(document).ready(function() {
        $('select[name="Grade_id"]').on('change', function() {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: '/student/ajax_get_classroom/' + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function(key, value) {
                            console.log(value);
                            console.log(key.ar);
                            $('select[name="Class_id"]').append(
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

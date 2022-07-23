<script>
    function pushNotificationIntoFirebase(sender_id, receiver_id, title, description, is_readed)
    {
        $.ajax({
            'url' : "{{url('add_notification_in_database')}}",
            'type' : 'POST',
            'data' : {
                '_token' : "{{ csrf_token() }}",
                'sender_id' : sender_id,
                'receiver_id' : receiver_id,
                'title' : title,
                'description' : description,
                'is_readed': is_readed,
            },
            'success' : function(response) {
                location.reload();
                // firebase.database().ref('elmuster-notification').push({
                //     'sender_id': sender_id,
                //     'receiver_id': receiver_id,
                //     'title': title,
                //     'description': description,
                //     'is_readed': is_readed,
                //     'date_time' : Date()
                // });
            }
        });
    }
</script>

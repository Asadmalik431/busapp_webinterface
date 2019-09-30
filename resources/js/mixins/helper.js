
module.exports = {
    methods: {
        listenNotification: function () {
            Echo.private('notification_admin')
            .listen('NotificationEvent', (data) => {
                let mesage_body = JSON.parse(data.data.notification_cntxt);
                message_count   = data.data.notification_count;
                message_context = '';
                $.each(mesage_body, function( index, value ) {
                    let notyid       = value['id'];
                    message_context += '<a  class="dropdown-item notification_click" notyId = "'+notyid+'">';
                    message_context += '<i class="fas fa-envelope mr-2"></i>';
                    message_context += value["name"];
                    message_context += ' Starts Trip';
                    message_context += '</a>';  
                });
                $(".badg_count").html(message_count);
                $(".message_context").html(message_context);
                $(".message_count_custom").html(message_count+' Notifications');
                toast.fire({
                    type: 'success',
                    title: mesage_body[0]['name'] + ' Started Trip',
                })
                let notification = new Notification('Start Trip', {
                    body: mesage_body[0]['name'] + ' Started Trip'
                });
                
                notification.onclick = () => {
                    window.open(window.location.href);
                };
            
            });
        },
        get_all_notification(){
            axios({
                method: 'get',
                url: api_url +'/get_all_notifications/',
                })
                .then(function (response) {
                
                message_context = '';
                mesage_body     = JSON.parse(response.data.notification_cntxt);
                if(response.data.notification_count != 0){
                    message_count   = response.data.notification_count;
                }
                
                message_context = '';
                $.each(mesage_body, function( index, value ) {
                    let notyid       = value['id'];
                    message_context += '<a  class="dropdown-item notification_click" notyId = "'+notyid+'">';
                    message_context += '<i class="fas fa-envelope mr-2"></i>';
                    message_context += value["name"];
                    message_context += ' Starts Trip';
                    message_context += '</a>';  
                });
                $(".badg_count").html(message_count);
                $(".message_context").html(message_context);
                $(".message_count_custom").html(message_count+' Notifications');
                
            })
                .catch(function (response) {
            });
        },
    }
}
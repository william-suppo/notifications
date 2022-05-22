<template>
    <div class="flex flex-col justify-top min-h-screen">
        <h1 class="text-3xl font-extrabold text-secondary-dark mx-auto my-4 w-1/3 text-left">Notifications</h1>
        <div class="mx-auto w-1/3">
            <div class="border border-secondary rounded p-4 mb-4" v-for="notification in notifications">
                <div class="uppercase text-sm mb-2 text-gray-600">
                    <div>{{ notification.title }}</div>
                    <div class="text-xs">{{ notification.sent_at }}</div>
                </div>
                <div>{{ notification.content }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NotificationList",

    props: [
        'user',
    ],

    data() {
        return {
            notifications: [],
        }
    },

    created() {
        Echo.private('App.Models.User.' + this.user)
            .notification((notification) => {
                console.log(notification);
                this.notifications.unshift(notification);
            });

        this.fetch();
    },

    methods: {
        fetch() {
            axios
                .get('/api/notifications')
                .then((response) => {
                    console.log(response);
                    this.notifications = _.map(response.data, function (notification) {
                        return notification.data; // todo: ajouter l'id
                    });
                });
        },

        markAsRead(notification) {
            axios
                .put('/api/notifications/read', {
                    'id': notification.id
                })
                .then((response) => {
                    // todo: retirer notification du tableau
                });
        }
    }
}
</script>

<style scoped>

</style>

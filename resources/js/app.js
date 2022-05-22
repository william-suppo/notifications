require('./bootstrap');

import { createApp } from "vue";
import NotificationCounter from "./components/NotificationCounter";
import NotificationList from "./components/NotificationList";

const app = createApp({
    components: {
        NotificationCounter,
        NotificationList,
    }
});

app.mount("#app");

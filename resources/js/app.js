import './bootstrap';

import { createApp } from "vue";
import PreviewBookDetail from "./components/PreviewBookDetail.vue";

const app = createApp({
    components: {
        PreviewBookDetail,
    }
});

app.mount("#preview-book-detail");

<template>
    <AppLayout :title="post.title">
        <h1>{{ post.title }}</h1>
        <span>{{ formattedDate }} ago by {{ post.user.name }}</span>
        <article>
            {{ post.body }}
        </article>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { formatDistance, parseISO } from "date-fns";
import { computed } from "vue";
const props = defineProps({
    post: Object,
});

const formattedDate = computed(() =>
    formatDistance(parseISO(props.post.created_at), new Date()),
);
</script>

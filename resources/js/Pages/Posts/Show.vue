<template>
    <AppLayout :title="post.title">
        <Container>
            <h1 class="text-2xl font-bold">{{ post.title }}</h1>
            <span class="block mt-1 text-sm text-gray-600"
                >{{ formattedDate }} ago by {{ post.user.name }}</span
            >
            <article class="mt-6">
                <pre class="whitespace-pre-wrap font-sans">{{ post.body }}</pre>
            </article>
            <div class="mt-12">
                <h2 class="text-xl font-semibold">Comments</h2>
                <ul class="divide-y mt-4">
                    <li
                        v-for="comment in comments.data"
                        :key="comment.id"
                        class="block px-2 py-4"
                    >
                        <span class="text-sm">
                            {{ comment.body }}
                        </span>
                        <span
                            class="first-letter:uppercase block pt-1 text-sm text-gray-600"
                        >
                            By Joe Bloggs
                        </span>
                    </li>
                </ul>
                <Pagination :meta="comments.meta" />
            </div>
        </Container>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import { formatDistance, parseISO } from "date-fns";
import { computed } from "vue";
const props = defineProps({
    post: Object,
    comments: Object,
});

const formattedDate = computed(() =>
    formatDistance(parseISO(props.post.created_at), new Date()),
);
</script>

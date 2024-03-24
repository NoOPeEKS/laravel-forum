<template>
    <div class="sm:flex">
        <div class="mb-4 flex-shrink-0 sm:mb-0 sm:mr-4">
            <img
                :src="comment.user.profile_photo_url"
                class="h-10 w-10 rounded-full"
            />
        </div>
        <div class="flex-1">
            <p class="mt-1 break-all">{{ comment.body }}</p>
            <span
                class="first-letter:uppercase block pt-1 text-xs text-gray-600"
                >By {{ comment.user.name }}
                {{ relativeDate(comment.created_at) }} ago</span
            >
            <div class="mt-2 text-right empty:hidden">
                <form
                    v-if="comment.can?.delete"
                    @submit.prevent="$emit('delete', comment.id)"
                >
                    <button
                        class="hover:font-semibold font-mono text-red-700 text-sm"
                    >
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { relativeDate } from "@/Utilities/date.js";
import { router } from "@inertiajs/vue3";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
const props = defineProps({
    comment: Object,
});

const emit = defineEmits(["delete"]);
</script>

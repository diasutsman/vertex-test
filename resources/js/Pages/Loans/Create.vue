<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    amount: "",
    term: "",
});

const submit = () => {
    form.post(route("loan.store"));
};
</script>

<template>
    <Head title="Apply Loan" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6"
                >
                    <form @submit.prevent="submit" class="flex flex-col gap-3">
                        <div class="flex justify-between items-center">
                            <h2
                                class="text-xl font-semibold leading-tight text-gray-800"
                            >
                                Apply Loan
                            </h2>
                        </div>
                        <div>
                            <InputLabel for="amount" value="Amount" />

                            <TextInput
                                id="amount"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.amount"
                                required
                                autofocus
                                autocomplete="username"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.amount"
                            />
                        </div>
                        <div>
                            <InputLabel for="term" value="Term (in weeks)" />

                            <TextInput
                                id="term"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.term"
                                required
                                autofocus
                                autocomplete="username"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.term"
                            />
                        </div>
                        <div>
                            <PrimaryButton
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Apply
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

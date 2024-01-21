<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    loans: {
        type: Array,
    },
    success: {
        type: String,
    },
    error: {
        type: String,
    },
});
</script>

<template>
    <Head title="Loans" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div v-if="success"
                    class="mb-4 font-medium text-sm bg-green-400 text-white px-6 py-3 rounded-lg border-green-600 border-2"
                >
                    {{ success }}
                </div>
                <div v-if="error"
                    class="mb-4 font-medium text-sm bg-red-400 text-white px-6 py-3 rounded-lg border-red-600 border-2"
                >
                    {{ error }}
                </div>
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6"
                >
                    <div class="flex justify-between items-center">
                        <div class="text-gray-900">
                            <h2
                                class="text-xl font-semibold leading-tight text-gray-800"
                            >
                                <span
                                    v-if="
                                        $page.props.auth.user.permissions.includes(
                                            'view-all-loans'
                                        )
                                    "
                                    >Loans need to be accepted</span
                                >
                                <span
                                    v-if="
                                        $page.props.auth.user.permissions.includes(
                                            'view-owned-loans'
                                        )
                                    "
                                    >Loans waiting to be accepted by admin</span
                                >
                            </h2>
                        </div>
                        <Link
                            :href="route('loan.create')"
                            v-if="
                                $page.props.auth.user.permissions.includes(
                                    'apply-loans'
                                )
                            "
                            class="flex px-3 py-2 bg-green-400 mr-1 text-white font-semibold rounded"
                        >
                            <span>Apply Loan</span>
                        </Link>
                    </div>
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th
                                    scope="col"
                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                >
                                    #
                                </th>
                                <th
                                    scope="col"
                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                >
                                    Amount
                                </th>
                                <th
                                    scope="col"
                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                >
                                    Term
                                </th>
                                <th
                                    scope="col"
                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                >
                                    Status
                                </th>
                                <th
                                    scope="col"
                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                >
                                    Date of Loan
                                </th>
                            </tr>
                        </thead>
                        <tbody v-for="(loan, index) in loans">
                            <tr class="border-b" v-bind:class="{'bg-gray-100': index % 2 == 0, 'bg-white': index % 2 != 0}">
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                >
                                    {{ index + 1 }}
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                >
                                    {{ loan.amount }}
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                >
                                    {{ loan.term }}
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                >
                                    {{ loan.status }}
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                >
                                    {{ loan.created_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

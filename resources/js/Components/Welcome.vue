<script setup>
import { ref, computed } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { usePage } from '@inertiajs/vue3'; // To access user data from Laravel

// Access user data from the Inertia page props
const user = computed(() => usePage().props.auth.user || {});

console.log(user);
// Modals visibility state
const showAddPartnerModal = ref(false);
const showAddMemberModal = ref(false);
const showAddOfferModal = ref(false);

// Roles dropdown options
const roles = [
    { value: 'Admin', label: 'Admin' },
    { value: 'Manager', label: 'Manager' },
    { value: 'Employee', label: 'Employee' },
];

// Offer categories dropdown options
const categories = [
    { value: 'Retail', label: 'Retail' },
    { value: 'Oil', label: 'Oil' },
    { value: 'Fitness', label: 'Fitness' },
];
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <ApplicationLogo class="block h-12 w-auto" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome {{ user.name }}
                <!-- Displays the current user's name -->
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                Laravel Jetstream provides a beautiful, robust starting point
                for your next Laravel application. Laravel is designed to help
                you build your application using a development environment that
                is simple, powerful, and enjoyable.
            </p>
        </div>

        <!-- Buttons for adding partners, members, and offers -->
        <div class="flex gap-4 mt-4 p-6">
            <div v-if="user.is_superuser">
                <button
                    @click="showAddPartnerModal = true"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                >
                    Add Partner
                </button>
                <button
                    @click="showAddMemberModal = true"
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                >
                    Add Member
                </button>
            </div>
            <button
                @click="showAddOfferModal = true"
                class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600"
            >
                Add Offer
            </button>
        </div>

        <!-- Add Partner Modal -->
        <div v-if="showAddPartnerModal" class="modal">
            <div class="modal-content">
                <h2 class="text-lg font-bold">Add Partner</h2>
                <form>
                    <div class="mt-4">
                        <label>Email <span class="text-red-500">*</span></label>
                        <input type="email" class="input" required />
                    </div>
                    <div class="mt-4">
                        <label>CVR <span class="text-red-500">*</span></label>
                        <input type="number" class="input" required />
                    </div>
                    <div class="mt-4">
                        <label>Name</label>
                        <input type="text" class="input" />
                    </div>
                    <div class="mt-4">
                        <label>Role</label>
                        <select class="input">
                            <option
                                v-for="role in roles"
                                :key="role.value"
                                :value="role.value"
                                :selected="role.value === 'Admin'"
                            >
                                {{ role.label }}
                            </option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <button
                            @click.prevent="showAddPartnerModal = false"
                            class="btn-secondary"
                        >
                            Cancel
                        </button>
                        <button type="submit" class="btn-primary">
                            Invite
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Member Modal -->
        <div v-if="showAddMemberModal" class="modal">
            <div class="modal-content">
                <h2 class="text-lg font-bold">Add Member</h2>
                <form>
                    <div class="mt-4">
                        <label>Email <span class="text-red-500">*</span></label>
                        <input type="email" class="input" required />
                    </div>
                    <div class="mt-4">
                        <label>CVR <span class="text-red-500">*</span></label>
                        <input type="number" class="input" required />
                    </div>
                    <div class="mt-4">
                        <label>Name</label>
                        <input type="text" class="input" />
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <button
                            @click.prevent="showAddMemberModal = false"
                            class="btn-secondary"
                        >
                            Cancel
                        </button>
                        <button type="submit" class="btn-primary">
                            Invite
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Offer Modal -->
        <div v-if="showAddOfferModal" class="modal">
            <div class="modal-content">
                <h2 class="text-lg font-bold">Add Offer</h2>
                <form>
                    <div class="mt-4">
                        <label>Offer Code</label>
                        <input type="text" class="input" />
                    </div>
                    <div class="mt-4">
                        <label>Offer Link</label>
                        <input type="text" class="input" />
                    </div>
                    <div class="mt-4">
                        <label>Link</label>
                        <input type="text" class="input" />
                    </div>
                    <div class="mt-4">
                        <label>Description</label>
                        <textarea class="input"></textarea>
                    </div>
                    <div class="mt-4">
                        <label>Image Link</label>
                        <input type="text" class="input" />
                    </div>
                    <div class="mt-4">
                        <label>Quantity</label>
                        <input type="number" class="input" />
                    </div>
                    <div class="mt-4">
                        <label>Expiration Date</label>
                        <input type="date" class="input" />
                    </div>
                    <div class="mt-4">
                        <label>Category</label>
                        <select class="input">
                            <option
                                v-for="category in categories"
                                :key="category.value"
                                :value="category.value"
                            >
                                {{ category.label }}
                            </option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <button
                            @click.prevent="showAddOfferModal = false"
                            class="btn-secondary"
                        >
                            Cancel
                        </button>
                        <button type="submit" class="btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style>
/* Example Modal Styles */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}
.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 400px;
}
.input {
    width: 100%;
    padding: 8px;
    margin-top: 4px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.btn-primary {
    background-color: #4caf50;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.btn-primary:hover {
    background-color: #45a049;
}
.btn-secondary {
    background-color: #f44336;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.btn-secondary:hover {
    background-color: #e53935;
}
</style>

<div id="profile-page" class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Account</h1>
            <p class="mt-2 text-gray-600">Manage your profile, orders, and address</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Sidebar -->
            <div class="lg:w-1/4">
                <!-- Profile Card -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <div class="flex flex-col items-center text-center">
                        <!-- Profile Avatar -->
                        <div
                            class="h-20 w-20 rounded-full bg-gradient-to-br from-amber-100 to-amber-200 flex items-center justify-center mb-4">
                            <span class="text-2xl font-bold text-amber-600">JD</span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900">John Doe</h3>
                        <p class="text-sm text-gray-600 mt-1">john.doe@example.com</p>
                        <p class="text-xs text-gray-500 mt-1">Member since Jan 2024</p>

                        <!-- Quick Actions - Responsive button sizes -->
                        <div class="mt-6 w-full flex flex-col items-center space-y-3">
                            <button onclick="location.href='/wishlist'"
                                class="profile-quick-btn w-full sm:w-auto min-w-[220px] max-w-[320px] inline-flex items-center justify-center px-3 py-2 text-sm font-medium border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <span>View Wishlist</span>
                            </button>

                            <button onclick="location.href='/cart'"
                                class="profile-quick-btn w-full sm:w-auto min-w-[220px] max-w-[320px] inline-flex items-center justify-center px-3 py-2 text-sm font-medium border border-amber-600 text-amber-600 bg-white hover:bg-amber-50 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>Go to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Account Stats -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Account Stats</h4>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Total Orders</span>
                            <span class="text-sm font-bold text-gray-900">8</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Pending Orders</span>
                            <span class="text-sm font-bold text-amber-600">2</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Wishlist Items</span>
                            <span class="text-sm font-bold text-gray-900">12</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:w-3/4">
                <!-- Tabs Navigation -->
                <div class="mb-6">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8">
                            <button id="orders-tab" onclick="switchTab('orders')"
                                class="profile-tab-btn py-3 px-1 border-b-2 font-medium text-sm border-amber-500 text-amber-600">
                                My Orders
                            </button>
                            <button id="address-tab" onclick="switchTab('address')"
                                class="profile-tab-btn py-3 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                My Address
                            </button>
                            <button id="profile-tab" onclick="switchTab('profile')"
                                class="profile-tab-btn py-3 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                Profile Info
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Tab Content -->
                <div id="tab-content">
                    <!-- Orders Tab (Default) -->
                    <div id="orders-content" class="profile-tab-panel">
                        <!-- Order Filter -->
                        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Orders</h3>
                            <div class="flex items-center space-x-4">
                                <select id="order-filter"
                                    class="text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500">
                                    <option value="all">All Orders</option>
                                    <option value="pending">Pending</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <!-- Orders List -->
                        <div class="space-y-4">
                            @php
                                $orders = [
                                    [
                                        'id' => 'ORD-78945',
                                        'date' => '2024-01-15',
                                        'items' => [
                                            [
                                                'name' => 'Premium Wireless Headphones',
                                                'qty' => 1,
                                                'price' => 249.99,
                                                'image' =>
                                                    'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100&h=100&fit=crop&crop=center',
                                            ],
                                            [
                                                'name' => 'Phone Case',
                                                'qty' => 2,
                                                'price' => 19.99,
                                                'image' =>
                                                    'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=100&h=100&fit=crop&crop=center',
                                            ],
                                        ],
                                        'total' => 289.97,
                                        'status' => 'delivered',
                                        'status_color' => 'bg-green-100 text-green-800',
                                        'estimated_delivery' => '2024-01-20',
                                    ],
                                    [
                                        'id' => 'ORD-78944',
                                        'date' => '2024-01-12',
                                        'items' => [
                                            [
                                                'name' => 'Smart Fitness Watch',
                                                'qty' => 1,
                                                'price' => 199.99,
                                                'image' =>
                                                    'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=100&h=100&fit=crop&crop=center',
                                            ],
                                        ],
                                        'total' => 199.99,
                                        'status' => 'processing',
                                        'status_color' => 'bg-blue-100 text-blue-800',
                                        'estimated_delivery' => '2024-01-25',
                                    ],
                                    [
                                        'id' => 'ORD-78943',
                                        'date' => '2024-01-10',
                                        'items' => [
                                            [
                                                'name' => 'Organic Cotton T-Shirt',
                                                'qty' => 3,
                                                'price' => 34.99,
                                                'image' =>
                                                    'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=100&h=100&fit=crop&crop=center',
                                            ],
                                            [
                                                'name' => 'Casual Sneakers',
                                                'qty' => 1,
                                                'price' => 89.99,
                                                'image' =>
                                                    'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100&h=100&fit=crop&crop=center',
                                            ],
                                        ],
                                        'total' => 194.96,
                                        'status' => 'shipped',
                                        'status_color' => 'bg-amber-100 text-amber-800',
                                        'estimated_delivery' => '2024-01-18',
                                    ],
                                    [
                                        'id' => 'ORD-78942',
                                        'date' => '2024-01-05',
                                        'items' => [
                                            [
                                                'name' => 'Gaming Mouse',
                                                'qty' => 1,
                                                'price' => 59.99,
                                                'image' =>
                                                    'https://images.unsplash.com/photo-1527814050087-3793815479db?w=100&h=100&fit=crop&crop=center',
                                            ],
                                            [
                                                'name' => 'Mechanical Keyboard',
                                                'qty' => 1,
                                                'price' => 129.99,
                                                'image' =>
                                                    'https://images.unsplash.com/photo-1601445638532-3c6f6c3aa1d6?w=100&h=100&fit=crop&crop=center',
                                            ],
                                        ],
                                        'total' => 189.98,
                                        'status' => 'cancelled',
                                        'status_color' => 'bg-red-100 text-red-800',
                                        'estimated_delivery' => null,
                                    ],
                                ];
                            @endphp

                            @foreach ($orders as $order)
                                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                                    <!-- Order Header -->
                                    <div class="p-4 sm:p-6 border-b border-gray-200">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                            <div>
                                                <div class="flex items-center gap-3">
                                                    <h4 class="text-base font-semibold text-gray-900">
                                                        {{ $order['id'] }}</h4>
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order['status_color'] }}">
                                                        {{ ucfirst($order['status']) }}
                                                    </span>
                                                </div>
                                                <p class="text-sm text-gray-600 mt-1">Ordered on
                                                    {{ date('M d, Y', strtotime($order['date'])) }}</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-lg font-bold text-gray-900">
                                                    ${{ number_format($order['total'], 2) }}</p>
                                                @if ($order['estimated_delivery'])
                                                    <p class="text-sm text-gray-600">Est. delivery:
                                                        {{ date('M d, Y', strtotime($order['estimated_delivery'])) }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Order Items -->
                                    <div class="p-4 sm:p-6">
                                        <h5 class="text-sm font-medium text-gray-900 mb-3">Items
                                            ({{ count($order['items']) }})</h5>
                                        <div class="space-y-4">
                                            @foreach ($order['items'] as $item)
                                                <div class="flex items-start gap-4">
                                                    <!-- Product Image -->
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                                            class="h-16 w-16 rounded-md object-cover">
                                                    </div>

                                                    <!-- Product Info -->
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate">
                                                            {{ $item['name'] }}</p>
                                                        <div class="flex items-center justify-between mt-1">
                                                            <p class="text-xs text-gray-500">Quantity:
                                                                {{ $item['qty'] }}</p>
                                                            <p class="text-sm font-medium text-gray-900">
                                                                ${{ number_format($item['price'] * $item['qty'], 2) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Simplified Order Timeline & Actions -->
                                    <div class="px-4 sm:px-6 py-4 bg-gray-50 border-t border-gray-200">
                                        <!-- Order Status Timeline (Compact) -->
                                        <div class="flex items-center justify-between mb-4">
                                            @php
                                                $timelineSteps = [
                                                    ['icon' => '📦', 'label' => 'Ordered', 'active' => true],
                                                    [
                                                        'icon' => '⚙️',
                                                        'label' => 'Processing',
                                                        'active' => in_array($order['status'], [
                                                            'processing',
                                                            'shipped',
                                                            'delivered',
                                                        ]),
                                                    ],
                                                    [
                                                        'icon' => '🚚',
                                                        'label' => 'Shipped',
                                                        'active' => in_array($order['status'], [
                                                            'shipped',
                                                            'delivered',
                                                        ]),
                                                    ],
                                                    [
                                                        'icon' => '✅',
                                                        'label' => 'Delivered',
                                                        'active' => $order['status'] === 'delivered',
                                                    ],
                                                ];

                                                if ($order['status'] === 'cancelled') {
                                                    $timelineSteps = [
                                                        ['icon' => '📦', 'label' => 'Ordered', 'active' => true],
                                                        ['icon' => '❌', 'label' => 'Cancelled', 'active' => true],
                                                    ];
                                                }
                                            @endphp

                                            @foreach ($timelineSteps as $step)
                                                <div class="flex flex-col items-center text-center">
                                                    <div
                                                        class="h-8 w-8 rounded-full flex items-center justify-center text-sm mb-1
                    {{ $step['active']
                        ? ($order['status'] === 'cancelled'
                            ? 'bg-red-100 text-red-600'
                            : 'bg-green-100 text-green-600')
                        : 'bg-gray-100 text-gray-400' }}">
                                                        {{ $step['icon'] }}
                                                    </div>
                                                    <span
                                                        class="text-xs {{ $step['active'] ? 'text-gray-900 font-medium' : 'text-gray-500' }}">
                                                        {{ $step['label'] }}
                                                    </span>
                                                </div>

                                                @if (!$loop->last)
                                                    <div
                                                        class="flex-1 h-1 mx-2 {{ $step['active'] ? ($order['status'] === 'cancelled' ? 'bg-red-200' : 'bg-green-200') : 'bg-gray-200' }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <!-- Action Button -->
                                        <div class="flex justify-end">
                                            @if ($order['status'] === 'processing')
                                                <button onclick="cancelOrder('{{ $order['id'] }}')"
                                                    class="px-4 py-2 text-sm font-medium rounded-md border border-red-300 text-red-700 bg-white hover:bg-red-50 transition-colors duration-150">
                                                    Cancel Order
                                                </button>
                                            @elseif ($order['status'] === 'shipped')
                                                <button onclick="trackOrder('{{ $order['id'] }}')"
                                                    class="px-4 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-150">
                                                    Track Order
                                                </button>
                                            @elseif ($order['status'] === 'delivered')
                                                <button onclick="buyAgain('{{ $order['id'] }}')"
                                                    class="px-4 py-2 text-sm font-medium rounded-md border border-amber-600 text-amber-600 bg-white hover:bg-amber-50 transition-colors duration-150">
                                                    Buy Again
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8 flex items-center justify-between">
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of
                                <span class="font-medium">8</span> orders
                            </p>
                            <div class="flex space-x-2">
                                <button
                                    class="px-3 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                    Previous
                                </button>
                                <button
                                    class="px-3 py-2 text-sm font-medium rounded-md border border-amber-600 text-white bg-amber-600 hover:bg-amber-700">
                                    1
                                </button>
                                <button
                                    class="px-3 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-700 bg-white hover:bg-gray-50">
                                    2
                                </button>
                                <button
                                    class="px-3 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-700 bg-white hover:bg-gray-50">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Address Tab -->
                    <div id="address-content" class="profile-tab-panel hidden">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-900">Shipping Address</h3>
                            </div>

                            <!-- Editable Address Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Left Column -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-xs font-medium text-gray-500">Full Name</label>
                                        <input type="text" id="address-name" value="John Doe"
                                            class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                    </div>

                                    <div>
                                        <label class="text-xs font-medium text-gray-500">Phone Number</label>
                                        <input type="tel" id="address-phone" value="+1 (555) 123-4567"
                                            class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                    </div>

                                    <div>
                                        <label class="text-xs font-medium text-gray-500">Street Address</label>
                                        <input type="text" id="address-street" value="123 Main Street"
                                            class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="space-y-4">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-xs font-medium text-gray-500">City</label>
                                            <input type="text" id="address-city" value="New York"
                                                class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                        </div>

                                        <div>
                                            <label class="text-xs font-medium text-gray-500">State</label>
                                            <input type="text" id="address-state" value="NY"
                                                class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-xs font-medium text-gray-500">ZIP Code</label>
                                            <input type="text" id="address-zip" value="10001"
                                                class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                        </div>

                                        <div>
                                            <label class="text-xs font-medium text-gray-500">Country</label>
                                            <input type="text" id="address-country" value="United States"
                                                class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <div class="flex justify-end">
                                    <button onclick="saveAddress()"
                                        class="px-4 py-2 text-sm font-medium rounded-md border border-transparent text-white bg-amber-600 hover:bg-amber-700 transition-colors duration-150">
                                        Save Address
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Info Tab -->
                    <div id="profile-content" class="profile-tab-panel hidden">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-900">Personal Information</h3>
                            </div>

                            <!-- Editable Profile Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Left Column -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-xs font-medium text-gray-500">Full Name</label>
                                        <input type="text" id="profile-name" value="John Doe"
                                            class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                    </div>

                                    <div>
                                        <label class="text-xs font-medium text-gray-500">Email Address</label>
                                        <input type="email" id="profile-email" value="john.doe@example.com"
                                            class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-xs font-medium text-gray-500">Phone Number</label>
                                        <input type="tel" id="profile-phone" value="+1 (555) 123-4567"
                                            class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                    </div>

                                    <div>
                                        <label class="text-xs font-medium text-gray-500">Date of Birth</label>
                                        <input type="text" id="profile-dob" value="January 15, 1990"
                                            class="profile-input w-full px-3 py-2 text-sm border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500 bg-white text-gray-900 mt-1">
                                    </div>
                                </div>
                            </div>

                            <!-- Account Security Section -->
                            <div class="mt-8 pt-8 border-t border-gray-200">
                                <h4 class="text-sm font-medium text-gray-900 mb-4">Account Security</h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-xs font-medium text-gray-500">Password</label>
                                        <div class="mt-1 flex items-center justify-between">
                                            <p class="text-sm text-gray-900">••••••••</p>
                                            <button onclick="changePassword()"
                                                class="px-3 py-1 text-sm font-medium rounded-md border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-150">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <div class="flex justify-end">
                                    <button onclick="saveProfile()"
                                        class="px-4 py-2 text-sm font-medium rounded-md border border-transparent text-white bg-amber-600 hover:bg-amber-700 transition-colors duration-150">
                                        Save Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tab Switching
    function switchTab(tabName) {
        // Hide all tab panels
        document.querySelectorAll('.profile-tab-panel').forEach(panel => {
            panel.classList.add('hidden');
        });

        // Remove active class from all tabs
        document.querySelectorAll('.profile-tab-btn').forEach(tab => {
            tab.classList.remove('border-amber-500', 'text-amber-600');
            tab.classList.add('border-transparent', 'text-gray-500');
        });

        // Show selected tab panel
        document.getElementById(`${tabName}-content`).classList.remove('hidden');

        // Activate selected tab
        const activeTab = document.getElementById(`${tabName}-tab`);
        if (activeTab) {
            activeTab.classList.add('border-amber-500', 'text-amber-600');
            activeTab.classList.remove('border-transparent', 'text-gray-500');
        }
    }

    // Save functions
    function saveProfile() {
        console.log('Saving profile changes');

        // Collect profile data
        const profileData = {
            name: document.getElementById('profile-name').value,
            email: document.getElementById('profile-email').value,
            phone: document.getElementById('profile-phone').value,
            dob: document.getElementById('profile-dob').value
        };

        console.log('Profile data:', profileData);
        alert('Profile updated successfully!');
    }

    function saveAddress() {
        console.log('Saving address changes');

        // Collect address data
        const addressData = {
            name: document.getElementById('address-name').value,
            phone: document.getElementById('address-phone').value,
            street: document.getElementById('address-street').value,
            city: document.getElementById('address-city').value,
            state: document.getElementById('address-state').value,
            zip: document.getElementById('address-zip').value,
            country: document.getElementById('address-country').value
        };

        console.log('Address data:', addressData);
        alert('Address updated successfully!');
    }

    // Order Management
    function cancelOrder(orderId) {
        if (confirm('Are you sure you want to cancel this order?')) {
            console.log('Cancelling order:', orderId);
            alert(`Order ${orderId} cancelled (Demo)`);
        }
    }

    function trackOrder(orderId) {
        console.log('Tracking order:', orderId);
        alert(`Tracking order ${orderId} (Demo)`);
    }

    function buyAgain(orderId) {
        console.log('Buying again:', orderId);
        alert(`Adding all items from order ${orderId} to cart (Demo)`);
    }

    // Account Security
    function changePassword() {
        console.log('Changing password');
        alert('Opening password change form (Demo)');
    }

    // Order Filter
    document.getElementById('order-filter')?.addEventListener('change', function(e) {
        console.log('Filtering orders by:', e.target.value);
        alert(`Filtering orders by ${e.target.value} (Demo)`);
    });

    // Auto-save on Enter key (optional) - Only for profile inputs
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && e.target.classList.contains('profile-input')) {
            const input = e.target;
            if (input.id.startsWith('profile-')) {
                saveProfile();
            } else if (input.id.startsWith('address-')) {
                saveAddress();
            }
        }
    });
</script>

<style>
    /* Scoped styles for profile page only */
    #profile-page .profile-tab-btn {
        transition: all 0.2s ease;
    }

    #profile-page .profile-tab-panel {
        animation: profileFadeIn 0.3s ease;
    }

    @keyframes profileFadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Scoped input field styling - ONLY for profile-input class */
    #profile-page .profile-input {
        padding: 0.5rem 0.75rem !important;
        border-radius: 0.375rem !important;
        border: 1px solid #d1d5db !important;
    }

    #profile-page .profile-input:focus {
        outline: none !important;
        --tw-ring-offset-width: 0px !important;
        --tw-ring-offset-color: #fff !important;
        --tw-ring-color: rgba(217, 119, 6, 0.5) !important;
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color) !important;
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color) !important;
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000) !important;
        border-color: #d97706 !important;
    }

    /* Scoped quick action buttons */
    #profile-page .profile-quick-btn {
        transition: all 0.2s ease;
        border-radius: 0.375rem;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
    }

    /* Button sizing for different screens - Scoped */
    @media (max-width: 639px) {
        #profile-page .profile-quick-btn {
            padding: 0.375rem 0.5rem;
            font-size: 0.875rem;
        }

        #profile-page .profile-quick-btn svg {
            width: 1rem;
            height: 1rem;
            margin-right: 0.25rem;
        }
    }

    @media (min-width: 600px) and (max-width: 1023px) {
        #profile-page .profile-quick-btn {
            padding: 0.375rem 0.5rem;
            font-size: 0.75rem;
            min-height: 2rem;
        }

        #profile-page .profile-quick-btn svg {
            width: 0.875rem;
            height: 0.875rem;
            margin-right: 0.25rem;
        }
    }

    @media (min-width: 1024px) {
        #profile-page .profile-quick-btn {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }

        #profile-page .profile-quick-btn svg {
            width: 1rem;
            height: 1rem;
            margin-right: 0.5rem;
        }
    }

    /* Custom colors - Scoped */
    #profile-page .bg-amber-600 {
        background-color: #d97706;
    }

    #profile-page .hover\:bg-amber-700:hover {
        background-color: #b45309;
    }

    #profile-page .text-amber-600 {
        color: #d97706;
    }

    #profile-page .border-amber-500 {
        border-color: #d97706;
    }

    /* Consistent border radius - Scoped */
    #profile-page .rounded-xl {
        border-radius: 0.75rem;
    }

    #profile-page .rounded-lg {
        border-radius: 0.5rem;
    }

    #profile-page .rounded-md {
        border-radius: 0.375rem;
    }

    /* Better spacing for input labels - Scoped */
    #profile-page .text-xs {
        font-size: 0.75rem;
        line-height: 1rem;
    }

    #profile-page .mt-1 {
        margin-top: 0.25rem;
    }

    /* Consistent shadow - Scoped */
    #profile-page .shadow-sm {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
</style>

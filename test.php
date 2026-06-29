<?php
$role = null ?? 'customer';
$prefix = $role === 'teller' ? 'teller.' : '';
$links = [
    ['label' => 'Overview', 'route' => $prefix . 'dashboard'],
    ['label' => 'Accounts', 'route' => $prefix . 'accounts.index'],
    ['label' => 'Transfers', 'route' => $prefix . 'transfers.index'],
];

if ($role !== 'teller') {
    $links[] = ['label' => 'Statements', 'route' => 'statements.index'];
}

if (in_array($role, ['auditor', 'manager'])) {
    $links[] = ['label' => 'Reports', 'route' => 'reports.index'];
    $links[] = ['label' => 'Audit Trail', 'route' => 'audit.index'];
}
print_r($links);

import React from 'react'
import { usePage } from '@inertiajs/inertia-react';

export default function auth() {
    const authUser = usePage().props?.auth?.user
    return authUser
}

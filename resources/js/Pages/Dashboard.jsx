import React from "react";

import 'react-data-grid/lib/styles.css';
import DataGrid from 'react-data-grid';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/inertia-react';

const columns = [
    { key: 'id', name: 'ID' },
    { key: 'name', name: 'Name' },
    { key: 'email', name: 'Email' },
    { key: 'address_1', name: 'Endereço' },
    { key: 'address_2', name: 'Bairro' },
    { key: 'number', name: 'nº' },
    { key: 'city', name: 'Cidade' },
    { key: 'state', name: 'Estado' },
    { key: 'zipcode', name: 'CEP' },
];

const rows = [
    { id: 0, title: 'Example' },
    { id: 1, title: 'Demo' }
];

export default function Dashboard(props) {

    const [users, setUsers] = React.useState(props.users);

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-8xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <DataGrid className={'rdg-light'}  columns={columns} rows={users} />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

import Pagination from "@material-ui/lab/Pagination";
import React from 'react'
import { Inertia } from '@inertiajs/inertia';

export default function PaginationLinks({ data, path }) {

    const handlePaginationChange = (event, value) => {
        // alert(value);
        Inertia.get(path, { page: value }, { preserveScroll: true })
    };

    return (
        <Pagination
            color="primary"
            shape="rounded"
            siblingCount={0}
            boundaryCount={2} 
            count={Math.ceil(data.total / data.per_page)}
            defaultPage={1}
            page={data.current_page}
            onChange={handlePaginationChange}
        />
    )
}

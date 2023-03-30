import { usePage } from '@inertiajs/inertia-react'
import { Snackbar } from '@material-ui/core'
import { Alert } from '@mui/material'
import React from 'react'

export default function FlashMessages() {
    const { flash } = usePage().props

    const [open, setOpen] = React.useState(false);

    const handleClick = () => {
        setOpen(true);
    };

    const handleClose = (event, reason) => {
        if (reason === 'clickaway') {
            return;
        }

        setOpen(false);
    };

    React.useEffect(() => {
        setOpen(true)
    }, [flash])
    return (
        <>
            {flash.success && <Snackbar anchorOrigin={{ vertical:'top', horizontal:'right' }} open={open} autoHideDuration={6000} onClose={handleClose}>
                <Alert onClose={handleClose} severity="success" sx={{ width: '100%' }}>
                    {flash.success}
                </Alert>
            </Snackbar>}

            {flash.error && <Snackbar anchorOrigin={{ vertical:'top', horizontal:'center' }} open={open} autoHideDuration={6000} onClose={handleClose}>
                <Alert onClose={handleClose} severity="error" sx={{ width: '100%' }}>
                    {flash.error}
                </Alert>
            </Snackbar>}

        </>
    )
}

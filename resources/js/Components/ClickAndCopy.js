import { Paper } from '@material-ui/core';
import React, { useEffect, useState } from 'react'
import { CopyToClipboard } from 'react-copy-to-clipboard';
import IconButton from '@material-ui/core/IconButton';
import InputBase from '@material-ui/core/InputBase';
import SearchIcon from '@material-ui/icons/Search';
import Divider from '@material-ui/core/Divider';
import AssignmentIcon from '@material-ui/icons/Assignment';
import AssignmentTurnedInIcon from '@material-ui/icons/AssignmentTurnedIn';
import auth from './../Hooks/auth';

export default function ClickAndCopy({page = 'landing'}) {

    const [value, setValue] = useState('This is good')
    const [copied, setCopied] = useState(false)

    const authUsername = auth()?.username

    useEffect(() => {
        setValue(`${window?.location.protocol}//${window?.location.hostname}/${page}/${authUsername}`)
    }, [])

    useEffect(() => {
        return () => {
            setTimeout(() => {
                setCopied(false)
            }, 2000)
        }
    }, [copied])
    return (
        <div>
            {/* <input value={value}
                onChange={e => {
                    setValue(e.target.value)
                    setCopied(false)
                }} />

            <CopyToClipboard text={value}
                onCopy={() => setCopied(true)}>
                <button>Copy</button>
            </CopyToClipboard>

            {copied ? <span style={{ color: 'red' }}>Copied.</span> : null} */}

            <Paper
                component="div"
                sx={{ p: '2px 4px', display: 'flex', alignItems: 'center', width: 400 }}
            >
                {/* <IconButton sx={{ p: '10px' }} aria-label="menu">
                    <MenuIcon />
                </IconButton> */}
                <InputBase
                    sx={{ ml: 1, flex: 1 }}
                    placeholder="Sponsor link"
                    readOnly={true}
                    size='medium'
                    inputProps={{ 'aria-label': 'Sponsor link', 'style': { border: 'none', width:'300px' } }}
                    value={value}
                    onChange={e => {
                        setValue(e.target.value)
                        setCopied(false)
                    }}
                />
                <CopyToClipboard text={value}
                    onCopy={() => setCopied(true)}>
                    <IconButton type="submit" sx={{ p: '5px' }} aria-label="search" color={copied ? 'primary': 'default' }>
                        {!copied ? <AssignmentIcon /> : <AssignmentTurnedInIcon />}
                    </IconButton>
                </CopyToClipboard>
                {/* <Divider sx={{ height: 28, m: 0.5 }} orientation="vertical" />
                <IconButton color="primary" sx={{ p: '10px' }} aria-label="directions">
                    <DirectionsIcon />
                </IconButton> */}
            </Paper>
        </div>
    )
}

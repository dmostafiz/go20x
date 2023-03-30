import React, { useState } from 'react'
import { makeStyles } from "@material-ui/core/styles";
import { useTheme } from "@material-ui/core/styles";
import Box from "@material-ui/core/Box";
import Divider from "@material-ui/core/Divider";
import FilledInput from "@material-ui/core/FilledInput";
import FormControl from "@material-ui/core/FormControl";
import FormGroup from "@material-ui/core/FormGroup";
import FormLabel from "@material-ui/core/FormLabel";
import Grid from "@material-ui/core/Grid";
import Typography from "@material-ui/core/Typography";

import componentStyles from "../../../Argon/Assets/theme/views/admin/profile.js";
import auth from '../Hooks/auth';
import { Button } from '@material-ui/core';

import Tab from '@material-ui/core/Tab';
import TabContext from '@material-ui/lab/TabContext';
import TabList from '@material-ui/lab/TabList';
import TabPanel from '@material-ui/lab/TabPanel';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-react';

const useStyles = makeStyles(componentStyles);


export default function ProfileEditable() {

    const {errors} = usePage().props

    const classes = useStyles();
    const theme = useTheme();

    const [value, setValue] = useState('1');

    const handleChange = (event, newValue) => {
        setValue(newValue);
    };


    const [name, setName] = useState(auth().name)
    const [phone_number, setPhone] = useState(auth().phone_number)

    const [address, setAddress] = useState(auth().address)
    const [city, setCity] = useState(auth().city)
    const [country, setCountry] = useState(auth().country)
    const [zip, setZip] = useState(auth().zip)
    const [email, setEmail] = useState(auth().email)
    const [pin, setPin] = useState('')

    const [current_password, setCurrPass] = useState('')
    const [password, setPassword] = useState('')
    const [password_confirmation, setConfirmPass] = useState('')

    const handleUpdateProfofileInfo = () => {
        Inertia.post('/update_account', {
            name,
            phone_number,
            address,
            city,
            country,
            zip,
            update: 'profile'
        }, { preserveScroll: true })
    }

    const handleUpdateEmail = () => {
        Inertia.post('/update_account', {
            email,
            pin,
            update: 'email'
        }, { preserveScroll: true })
    }

    const handleUpdatePassword = () => {

        Inertia.post('/update_account', {
            current_password,
            password,
            password_confirmation,
            update: 'password'
        }, { preserveScroll: true })
    }


    return (
        <>

            <TabContext value={value}>
                <Box sx={{ borderBottom: 1, borderColor: 'divider' }}>
                    <TabList onChange={handleChange} aria-label="lab API tabs example">
                        <Tab label="User Information" value="1" />
                        <Tab label="Change Email" value="2" />
                        <Tab label="Change Password" value="3" />
                    </TabList>
                </Box>
                <TabPanel value="1">

                    <Box paddingY={5} paddingX={2}>
                        <Grid container>

                            <Grid item xs={12} lg={6}>
                                <FormGroup>
                                    <FormLabel>Full name</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="text"
                                            placeholder="Full name"
                                            value={name}
                                            onChange={e => setName(e.target.value)}
                                        />

                                        {errors.name && <span style={{color: 'red'}}>{errors.name}</span>}
                                    </FormControl>
                                </FormGroup>
                            </Grid>

                            <Grid item xs={12} lg={6}>
                                <FormGroup>
                                    <FormLabel>Phone</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="text"
                                            value={phone_number}
                                            onChange={e => setPhone(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.phone_number && <span style={{color: 'red'}}>{errors.phone_number} </span>}

                                </FormGroup>
                            </Grid>
                        </Grid>

                        <Grid container>
                            <Grid item xs={12}>
                                <FormGroup>
                                    <FormLabel>Address</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="text"
                                            placeholder='Your address'
                                            value={address}
                                            onChange={e => setAddress(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.address && <span style={{color: 'red'}}>{errors.address}</span>}

                                </FormGroup>
                            </Grid>
                        </Grid>

                        <Grid container>
                            <Grid item xs={12} lg={4}>
                                <FormGroup>
                                    <FormLabel>City</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="text"
                                            placeholder='City'
                                            value={city}
                                            onChange={e => setCity(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.city && <span style={{color: 'red'}}>{errors.city}</span>}

                                </FormGroup>
                            </Grid>
                            <Grid item xs={12} lg={4}>
                                <FormGroup>
                                    <FormLabel>Country</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="text"
                                            value={country}
                                            onChange={e => setCountry(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.country && <span style={{color: 'red'}}>{errors.country}</span>}

                                </FormGroup>
                            </Grid>
                            <Grid item xs={12} lg={4}>
                                <FormGroup>
                                    <FormLabel>Postal code</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >


                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="text"
                                            placeholder="Postal code"
                                            value={zip}
                                            onChange={e => setZip(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.zip && <span style={{color: 'red'}}>{errors.zip}</span>}

                                </FormGroup>
                            </Grid>
                        </Grid>

                        <Button onClick={handleUpdateProfofileInfo} color="success" variant="contained">Update Information</Button>
                    </Box>

                </TabPanel>
                <TabPanel value="2">
                    <Box paddingY={5} paddingX={2}>
                        <Grid container>
                            <Grid item xs={12} lg={8}>
                                <FormGroup>
                                    <FormLabel>Email</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="email"
                                            placeholder="Email address"
                                            value={email}
                                            onChange={e => setEmail(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.email && <span style={{color: 'red'}}>{errors.email}</span>}

                                </FormGroup>
                            </Grid>

                            <Grid item xs={12} lg={4}>
                                <FormGroup>
                                    <FormLabel>PIN Code</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="text"
                                            placeholder='Enter pin code'
                                            value={pin}
                                            onChange={e => setPin(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.pin && <span style={{color: 'red'}}>{errors.pin}</span>}

                                    <Box onClick={() => {
                                        alert('Send PIN Code')
                                    }} component='span' sx={{ cursor: 'pointer', color: 'blue', fontSize: '12px' }}>
                                        Send pin code
                                    </Box>
                                </FormGroup>
                            </Grid>
                        </Grid>


                        <Button onClick={handleUpdateEmail} color="success" variant="contained">Update Email</Button>
                    </Box>
                </TabPanel>

                <TabPanel value="3">
                    <Box paddingY={5} paddingX={2}>
                        <Grid container>

                            <Grid item xs={12} lg={4}>
                                <FormGroup>
                                    <FormLabel>Current Password</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="password"
                                            placeholder="Enter current password"
                                            value={current_password}
                                            onChange={e => setCurrPass(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.current_password && <span style={{color: 'red'}}>{errors.current_password}</span>}

                                </FormGroup>
                            </Grid>

                            <Grid item xs={12} lg={4}>
                                <FormGroup>
                                    <FormLabel>New Password</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="password"
                                            placeholder="Enter new password"
                                            value={password}
                                            onChange={e => setPassword(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.password && <span style={{color: 'red'}}>{errors.password}</span>}

                                </FormGroup>
                            </Grid>

                            <Grid item xs={12} lg={4}>
                                <FormGroup>
                                    <FormLabel>Confirm password</FormLabel>
                                    <FormControl
                                        variant="filled"
                                        component={Box}
                                        width="100%"
                                        marginBottom="1rem!important"
                                    >
                                        <Box
                                            paddingLeft="0.75rem"
                                            paddingRight="0.75rem"
                                            component={FilledInput}
                                            autoComplete="off"
                                            type="password"
                                            placeholder='Confirm new password'
                                            value={password_confirmation}
                                            onChange={e => setConfirmPass(e.target.value)}
                                        />
                                    </FormControl>
                                    {errors.password_confirmation && <span style={{color: 'red'}}>{errors.password_confirmation}</span>}

                                </FormGroup>
                            </Grid>
                        </Grid>


                        <Button onClick={handleUpdatePassword} color="success" variant="contained">Update Password</Button>
                    </Box>

                </TabPanel>
            </TabContext>


        </>
    )
}

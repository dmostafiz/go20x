import React from 'react'
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

const useStyles = makeStyles(componentStyles);


export default function ProfileDisabled({user = auth()}) {

    const classes = useStyles();
    const theme = useTheme();
    
    return (
        <>

            <Box
                component={Typography}
                variant="h6"
                color={theme.palette.gray[600] + "!important"}
                paddingTop=".25rem"
                paddingBottom=".25rem"
                fontSize=".75rem!important"
                letterSpacing=".04em"
                marginBottom="1.5rem!important"
                classes={{ root: classes.typographyRootH6 }}
            >
                User Information
            </Box>
            <div >
                <Grid container>
                    <Grid item xs={12} lg={6}>
                        <FormGroup>
                            <FormLabel>Username</FormLabel>
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
                                    readOnly={true}
                                    disabled={true}
                                    defaultValue={user.username}
                                />
                            </FormControl>
                        </FormGroup>
                    </Grid>
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
                                    readOnly={true}
                                    disabled={true}
                                    defaultValue={user.name}
                                />
                            </FormControl>
                        </FormGroup>
                    </Grid>
                </Grid>
                <Grid container>
                    <Grid item xs={12} lg={6}>
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
                                    readOnly={true}
                                    disabled={true}
                                    defaultValue={user.email}
                                />
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
                                    defaultValue={user.phone_number}
                                    readOnly={true}
                                    disabled={true}
                                />
                            </FormControl>
                        </FormGroup>
                    </Grid>
                </Grid>
            </div>
            <Box
                component={Divider}
                marginBottom="1.5rem!important"
                marginTop="1.5rem!important"
            />
            <Box
                component={Typography}
                variant="h6"
                color={theme.palette.gray[600] + "!important"}
                paddingTop=".25rem"
                paddingBottom=".25rem"
                fontSize=".75rem!important"
                letterSpacing=".04em"
                marginBottom="1.5rem!important"
                classes={{ root: classes.typographyRootH6 }}
            >
                Contact Information
            </Box>
            <div>
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
                                    defaultValue={user.address}
                                    readOnly={true}
                                    disabled={true}
                                />
                            </FormControl>
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
                                    value={user.city}
                                    readOnly={true}
                                    disabled={true}
                                />
                            </FormControl>
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
                                    value={user.country}
                                    readOnly={true}
                                    disabled={true}
                                />
                            </FormControl>
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
                                    value={user.zip}
                                    readOnly={true}
                                    disabled={true}
                                />
                            </FormControl>
                        </FormGroup>
                    </Grid>
                </Grid>
            </div>
        </>
    )
}

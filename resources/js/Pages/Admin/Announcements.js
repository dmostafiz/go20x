import React, { useEffect, useState } from "react";
import { Inertia } from '@inertiajs/inertia'
// @material-ui/core components
import { makeStyles } from "@material-ui/core/styles";
import { useTheme } from "@material-ui/core/styles";
import Box from "@material-ui/core/Box";
import Button from "@material-ui/core/Button";
import Card from "@material-ui/core/Card";
import CardContent from "@material-ui/core/CardContent";
import CardHeader from "@material-ui/core/CardHeader";
import Container from "@material-ui/core/Container";
import Divider from "@material-ui/core/Divider";
import FilledInput from "@material-ui/core/FilledInput";
import FormControl from "@material-ui/core/FormControl";
import FormGroup from "@material-ui/core/FormGroup";
import FormLabel from "@material-ui/core/FormLabel";
import Grid from "@material-ui/core/Grid";
import Typography from "@material-ui/core/Typography";
// @material-ui/icons components
import LocationOn from "@material-ui/icons/LocationOn";
import School from "@material-ui/icons/School";
import DashboardLayout from '../../Layouts/DashboardLayout';
// core components
import Header from "../../../../Argon/Components/Headers/Header.js";
import componentStyles from "../../../../Argon/Assets/theme/views/admin/profile.js";
import boxShadows from "../../../../Argon/Assets/theme/box-shadow.js";
import CardActions from '@material-ui/core/CardActions';
import { useForm, usePage } from '@inertiajs/inertia-react';
import FlashMessages from './../../Components/FlashMessages';
import PaginationLinks from './../../Components/PaginationLinks';
import AnnouncementsListTableAdmin from './../../Components/AnnouncementsListTableAdmin';
import HeaderAdmin from './../../Components/HeaderAdmin';

const useStyles = makeStyles(componentStyles);

function Announcements({announcements}) {

    const { errors } = usePage().props

    const [data, setData] = useState({
        title: '',
        image: '',
        description: '',
    })

    const classes = useStyles();
    const theme = useTheme();

    function saveAnnouncement(e) {
        e.preventDefault()

        Inertia.post('/admin/create_announcement', data)

        setData({ title: '', image: '', description: '' })

    }

    return (
        <DashboardLayout title='Announcements'>
            <HeaderAdmin/>

            {/* Page content */}
            <Container
                maxWidth={false}
                component={Box}
                marginTop="-6rem"
                classes={{ root: classes.containerRoot }}
            >
                <Grid container>
                    <Grid
                        item
                        xs={12}
                        xl={12}
                        component={Box}
                        marginBottom="3rem"
                        classes={{ root: classes.gridItemRoot + " " + classes.order2 }}
                    >
                        <Card
                            classes={{
                                root: classes.cardRoot + " " + classes.cardRootSecondary,
                            }}
                        >
                            <CardHeader
                                subheader={
                                    <Grid
                                        container
                                        component={Box}
                                        alignItems="center"
                                        justifyContent="space-between"
                                    >
                                        <Grid item xs="auto">
                                            <Box
                                                component={Typography}
                                                variant="h3"
                                                marginBottom="0!important"
                                            >
                                                Create Announcement
                                            </Box>
                                        </Grid>

                                    </Grid>
                                }
                                classes={{ root: classes.cardHeaderRoot }}
                            ></CardHeader>
                            <CardContent>
                                <div>
                                    <Grid container>
                                        <Grid item xs={12} lg={4}>
                                            <FormGroup>
                                                <FormLabel>Title</FormLabel>
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
                                                        placeholder="Announcement title"
                                                        value={data.title}
                                                        onChange={e => setData({ ...data, title: e.target.value })}
                                                    />
                                                </FormControl>
                                                {errors.title && <Box color="red">{errors.title}</Box>}
                                            </FormGroup>

                                            <FormGroup>
                                                <FormLabel>Image</FormLabel>
                                                <FormControl
                                                    variant="filled"
                                                    component={Box}
                                                    width="100%"
                                                    marginBottom="1rem!important"
                                                >
                                                    <input
                                                        type="file"
                                                        onChange={e => setData({ ...data, image: e.target.files[0] })}
                                                    />
                                                </FormControl>
                                                {errors.image && <Box color="red">{errors.image}</Box>}
                                            </FormGroup>
                                        </Grid>
                                        <Grid item xs={12} lg={8}>
                                            <FormGroup>
                                                <FormLabel>Description</FormLabel>
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
                                                        multiline
                                                        placeholder="Announcement description"
                                                        rows="6"
                                                        value={data.description}
                                                        onChange={e => setData({ ...data, description: e.target.value })}

                                                    />
                                                </FormControl>
                                                {errors.description && <Box color="red">{errors.description}</Box>}
                                            </FormGroup>
                                        </Grid>

                                    </Grid>
                                </div>


                            </CardContent>
                            <Box component={CardActions} justifyContent="flex-end">
                                <Button onClick={saveAnnouncement} variant="contained">Create</Button>
                            </Box>
                        </Card>
                    </Grid>

                </Grid>

                <Box height={30}>

                </Box>

                <Card mt={5} classes={{ root: classes.cardRoot }}>
                    <CardHeader
                        className={classes.cardHeader}
                        title="Announcements"
                        titleTypographyProps={{
                            component: Box,
                            marginBottom: "0!important",
                            variant: "h3",
                        }}
                    ></CardHeader>

                    <AnnouncementsListTableAdmin announcements={announcements} />

                    <Box
                        classes={{ root: classes.cardActionsRoot }}
                        component={CardActions}
                        justifyContent="flex-end"
                    >

                        <PaginationLinks
                            data={announcements}
                            path='/admin/announcements'
                        />
                    </Box>
                </Card>
            </Container>
        </DashboardLayout>
    );
}

export default Announcements;

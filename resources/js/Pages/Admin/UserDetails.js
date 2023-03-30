import React, { useEffect, useState } from "react";
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
// import MailOutlineIcon from "@material-ui/icons/MailOutlineIcon";
import MailOutlineIcon from '@mui/icons-material/MailOutline';
import School from "@material-ui/icons/School";
import DashboardLayout from '../../Layouts/DashboardLayout';
// core components
import UserProfileHeader from '../../Components/UserProfileHeader';

import componentStyles from "../../../../Argon/Assets/theme/views/admin/profile.js";
import boxShadows from "../../../../Argon/Assets/theme/box-shadow.js";
import auth from '../../Hooks/auth';
import axios from "axios";
import moment from 'moment';
import { styled } from '@mui/material/styles';
import { Inertia } from "@inertiajs/inertia";
import { Avatar } from "@mui/material";

import ProfileEditable from '../../Components/ProfileEditable';
import ProfileDisabled from '../../Components/ProfileDisabled';
import HeaderAdmin from './../../Components/HeaderAdmin';

const Input = styled('input')({
  display: 'none',
});

const useStyles = makeStyles(componentStyles);

function UserDetails({ mode, user }) {
  const classes = useStyles();
  const theme = useTheme();

  const handleImageChnage = (e) => {
    Inertia.post('/update_profile_image', { image: e.target.files[0] })
  }

  return (
    <DashboardLayout title='User Details'>
      <HeaderAdmin />
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
            xl={4}
            component={Box}
            marginBottom="3rem!important"
            classes={{ root: classes.order1 + " " + classes.marginBottomXl0 }}
          >
            <Card classes={{ root: classes.cardRoot }}>
              <Box component={Grid} container justifyContent="center">
                <Grid item xs={12} lg={3}>
                  <Box position="relative">
                    <Box
                      maxWidth="180px"
                      borderRadius="50%"
                      position="absolute"
                      left="50%"
                      top='80px'
                      boxShadow={boxShadows.boxShadow + "!important"}
                      className={classes.profileImage}
                    >
                      <Avatar
                        alt={user.name}
                        src={`/storage/profile/${user.avatar}`}
                        sx={{ width: '180px', height: '180px' }}
                      />
                    </Box>

                  </Box>
                </Grid>
              </Box>
              <Box
                component={CardHeader}
                border="0!important"
                textAlign="right"
                paddingBottom="5rem!important"
                paddingTop="8rem!important"
                classes={{ root: classes.cardHeaderRootProfile }}
              ></Box>

              <Box marginTop={[-6, 10]} marginBottom={[10, 10]} display="flex" justifyContent="center">

              </Box>

              <Box
                component={CardContent}
                classes={{ root: classes.ptMd4 }}
                paddingTop="0!important"
              >

                <Box textAlign="center">
                  <Typography variant="h3">
                    {user.name}
                    <Box component="span" fontWeight="300">
                      , #{user.username}
                    </Box>
                  </Typography>
                  <Box
                    component={Typography}
                    variant="h5"
                    fontWeight="300!important"
                    display="flex"
                    alignItems="center"
                    justifyContent="center"
                  >
                    {user.email} {user.parent && ` | Sponsored by ${user.parent?.username}`}
                  </Box>


                  <Box
                    component={Divider}
                    marginBottom="1.5rem!important"
                    marginTop="1.5rem!important"
                  />


                </Box>

                <Grid container>
                  <Grid item>
                    <Box
                      justifyContent="center"
                      display="flex"
                    // className={classes.mtMd5}
                    >
                      <Box
                        textAlign="center"
                        marginRight="1rem"
                        padding=".875rem"
                      >
                        <Box
                          component="span"
                          fontSize="1.1rem"
                          fontWeight="700"
                          display="block"
                          letterSpacing=".025em"
                          className={classes.typographyRootH6}
                        >
                          {moment(user.created_at).format('YYYY')}
                        </Box>
                        <Box
                          component="span"
                          fontSize=".875rem"
                          color={theme.palette.gray[500]}
                        >
                          Since Joined
                        </Box>
                      </Box>
                      <Box
                        textAlign="center"
                        marginRight="1rem"
                        padding=".875rem"
                      >
                        <Box
                          component="span"
                          fontSize="1.1rem"
                          fontWeight="700"
                          display="block"
                          letterSpacing=".025em"
                          className={classes.typographyRootH6}
                        >
                          {user.contacts?.length}
                        </Box>
                        <Box
                          component="span"
                          fontSize=".875rem"
                          color={theme.palette.gray[500]}
                        >
                          Contacts
                        </Box>
                      </Box>

                    </Box>
                  </Grid>
                </Grid>

              </Box>
            </Card>
          </Grid>

          <Grid
            item
            xs={12}
            xl={8}
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
                        Profile Info
                      </Box>
                    </Grid>
                    <Grid item xs="auto">
                      <Box
                        justifyContent="flex-end"
                        display="flex"
                        flexWrap="wrap"
                      >
                        {/* <Button
                          variant="contained"
                          color="primary"
                          size="small"
                        >
                          Settings
                        </Button> */}
                      </Box>
                    </Grid>
                  </Grid>
                }
                classes={{ root: classes.cardHeaderRoot }}
              ></CardHeader>
              <CardContent>

                 <ProfileDisabled user={user}/>

              </CardContent>
            </Card>
          </Grid>

        </Grid>
      </Container>
    </DashboardLayout>
  );
}

export default UserDetails;

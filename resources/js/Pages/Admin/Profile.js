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
import AdminProfileHeader from './../../Components/AdminProfileHeader';

import componentStyles from "../../../../Argon/Assets/theme/views/admin/profile.js";
import boxShadows from "../../../../Argon/Assets/theme/box-shadow.js";
import auth from './../../Hooks/auth';
import axios from "axios";
import moment from 'moment';
import { styled } from '@mui/material/styles';
import { Inertia } from "@inertiajs/inertia";
import { Avatar } from "@mui/material";

import ProfileDisabled from './../../Components/ProfileDisabled';
import ProfileEditable from './../../Components/ProfileEditable';

const Input = styled('input')({
  display: 'none',
});

const useStyles = makeStyles(componentStyles);

function Profile({ mode }) {
  const classes = useStyles();
  const theme = useTheme();

  const [user, setUser] = useState({})

  const authUser = auth()

  useEffect(async () => {
    const usr = await axios.get(`/get_user_data/${authUser.id}`)

    // console.log('User PRofile: ', usr.data)
    if (usr.data) {

      setUser(usr.data)
    }
  }, [])

  const handleImageChnage = (e) => {
    Inertia.post('/update_profile_image', { image: e.target.files[0] }, {preserveScroll: true})
  }

  return (
    <DashboardLayout title='Profile'>
      <AdminProfileHeader mode={mode} />
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
                        {mode == 'edit' ? 'Update account info' : 'My Profile Info'} 
                      </Box>
                    </Grid>
                
                  </Grid>
                }
                classes={{ root: classes.cardHeaderRoot }}
              ></CardHeader>
              <CardContent>

                {mode == 'edit' ? <ProfileEditable />  : <ProfileDisabled />}
                  
              </CardContent>
            </Card>
          </Grid>

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
                      boxShadow={boxShadows.boxShadow + "!important"}
                      className={classes.profileImage}
                    >
                    <Avatar
                      alt={auth().name}
                      src={`/storage/profile/${auth().avatar}`}
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

              <Box marginTop={[-8, 12]} marginBottom={[1, 1]} display="flex" justifyContent="center">
                {/* <Button
                  variant="contained"
                  size="medium"
                  classes={{ root: classes.buttonRootDark }}
                >
                  Change Image
                </Button> */}

                <label htmlFor="contained-button-file" classes={{ root: classes.buttonRootDark }}>
                  <Input onChange={handleImageChnage} accept="image/*" id="contained-button-file" type="file" />
                  <Button variant="contained" component='span'>
                    Change Image
                  </Button>
                </label>
              </Box>

              <Box
                component={CardContent}
                classes={{ root: classes.ptMd4 }}
                paddingTop="0!important"
              >

                <Box textAlign="center">
                  <Typography variant="h3">
                    {auth().name}
                    <Box component="span" fontWeight="300">
                      , #{auth().username}
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
                    {auth().email} {user.parent && ` | Sponsored by ${user.parent?.username}`}
                  </Box>

                </Box>

              </Box>
            </Card>
          </Grid>

        </Grid>
      </Container>
    </DashboardLayout>
  );
}

export default Profile;

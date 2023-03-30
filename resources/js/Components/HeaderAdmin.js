import React from "react";
// @material-ui/core components
import { makeStyles } from "@material-ui/core/styles";
import { useTheme } from "@material-ui/core/styles";
import Box from "@material-ui/core/Box";
import Container from "@material-ui/core/Container";
import Grid from "@material-ui/core/Grid";
// @material-ui/icons components
import ArrowDownward from "@material-ui/icons/ArrowDownward";
import ArrowUpward from "@material-ui/icons/ArrowUpward";
import EmojiEvents from "@material-ui/icons/EmojiEvents";
import GroupAdd from "@material-ui/icons/GroupAdd";
import InsertChartOutlined from "@material-ui/icons/InsertChartOutlined";
import PieChart from "@material-ui/icons/PieChart";

// core components
// import CardStats from "../Cards/CardStats.js";

// import componentStyles from "../../Assets/theme/components/header.js";
import componentStyles from './../../../Argon/Assets/theme/components/header.js';
import CardStats from "./../../../Argon/Components/Cards/CardStats.js";
import { FaUserCheck } from 'react-icons/fa';
import VerifiedUserIcon from '@material-ui/icons/VerifiedUser';
import CampaignIcon from '@mui/icons-material/Campaign';
import { usePage } from '@inertiajs/inertia-react';



const useStyles = makeStyles(componentStyles);

const HeaderAdmin = () => {
  const {totalLeads, newUsers, verifiedUsers, announcementsCount} = usePage().props
  const classes = useStyles();
  const theme = useTheme();
  return (
    <>
      <div className={classes.header}>
        <Container
          maxWidth={false}
          component={Box}
          classes={{ root: classes.containerRoot }}
        >
          <div>
            <Grid container>
              <Grid item xl={3} lg={6} xs={12}>
                <CardStats
                  subtitle="Contacts"
                  title={totalLeads}
                  icon={InsertChartOutlined}
                  color="bgError"
                />
              </Grid>
              <Grid item xl={3} lg={6} xs={12}>
                <CardStats
                  subtitle="New users"
                  title={newUsers}
                  icon={GroupAdd}
                  color="bgWarning"
                />
              </Grid>
              <Grid item xl={3} lg={6} xs={12}>
                <CardStats
                  subtitle="Verified Users"
                  title={verifiedUsers}
                  icon={VerifiedUserIcon}
                  color="bgWarningLight"
                />
              </Grid>
              <Grid item xl={3} lg={6} xs={12}>
                <CardStats
                  subtitle="Announcements"
                  title={announcementsCount}
                  icon={CampaignIcon}
                  color="bgInfo"
                />
              </Grid>
            </Grid>
          </div>
        </Container>
      </div>
    </>
  );
};

export default HeaderAdmin;

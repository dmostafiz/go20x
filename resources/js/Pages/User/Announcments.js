import React from "react";
// @material-ui/core components
import { makeStyles } from "@material-ui/core/styles";
import Box from "@material-ui/core/Box";
import Card from "@material-ui/core/Card";
import CardActions from "@material-ui/core/CardActions";
import CardHeader from "@material-ui/core/CardHeader";
import Container from "@material-ui/core/Container";
import DashboardLayout from '../../Layouts/DashboardLayout';

// core components
import HeaderUser from './../../Components/HeaderUser';
import AnnouncementsListTable from './../../Components/AnnouncementsListTable';
import componentStyles from "../../../../Argon/Assets/theme/views/admin/tables.js";
import PaginationLinks from './../../Components/PaginationLinks';

const useStyles = makeStyles(componentStyles);

const Announcments = ({announcements}) => {
  const classes = useStyles();

  return (
    <DashboardLayout title='Announcements'>
      <HeaderUser />
      {/* Page content */}
      <Container
        maxWidth={false}
        component={Box}
        marginTop="-6rem"
        classes={{ root: classes.containerRoot }}
      >


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

          <AnnouncementsListTable announcements={announcements} />

          <Box
            classes={{ root: classes.cardActionsRoot }}
            component={CardActions}
            justifyContent="flex-end"
          >

            <PaginationLinks
              data={announcements}
              path='/user/announcements'
            />
          </Box>
        </Card>
      </Container>
    </DashboardLayout>
  );
};

export default Announcments;

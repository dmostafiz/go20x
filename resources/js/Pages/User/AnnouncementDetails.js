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
import Header from "../../../../Argon/Components/Headers/Header.js";
import AnnouncementsListTable from '../../Components/AnnouncementsListTable';
import componentStyles from "../../../../Argon/Assets/theme/views/admin/tables.js";
import PaginationLinks from '../../Components/PaginationLinks';
import HeaderUser from './../../Components/HeaderUser';
const useStyles = makeStyles(componentStyles);

const AnnouncementDetails = ({announcement}) => {
  const classes = useStyles();

  return (
    <DashboardLayout title='Announcement Details'>
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
            title={announcement.title}
            titleTypographyProps={{
              component: Box,
              marginBottom: "0!important",
              variant: "h3",
            }}
          ></CardHeader>
          
          <Box paddingX={5} >
             <img style={{ width:'100%', maxWidth: '100%'}} src={`/${announcement.image}`}/>
          </Box>

          <Box
            classes={{ root: classes.cardActionsRoot }}
            component='p'
            fontSize='24px'
            paddingX={5}
          >
            
             {announcement.description}
          </Box>
        </Card>
      </Container>
    </DashboardLayout>
  );
};

export default AnnouncementDetails;

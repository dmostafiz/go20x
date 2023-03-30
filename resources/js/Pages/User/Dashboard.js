import React from "react";
// javascipt plugin for creating charts
import Chart from "chart.js";
// react plugin used to create charts
import { Line, Bar } from "react-chartjs-2";
// @material-ui/core components
import { makeStyles } from "@material-ui/core/styles";
import { useTheme } from "@material-ui/core/styles";
import Box from "@material-ui/core/Box";
import Button from "@material-ui/core/Button";
import Card from "@material-ui/core/Card";
import CardContent from "@material-ui/core/CardContent";
import CardHeader from "@material-ui/core/CardHeader";
import Container from "@material-ui/core/Container";
import Grid from "@material-ui/core/Grid";
import LinearProgress from "@material-ui/core/LinearProgress";
import Table from "@material-ui/core/Table";
import TableBody from "@material-ui/core/TableBody";
import TableCell from "@material-ui/core/TableCell";
import TableContainer from "@material-ui/core/TableContainer";
import TableHead from "@material-ui/core/TableHead";
import TableRow from "@material-ui/core/TableRow";
import Typography from "@material-ui/core/Typography";
// @material-ui/icons components
import CardActions from "@material-ui/core/CardActions";
import ArrowDownward from "@material-ui/icons/ArrowDownward";
import ArrowUpward from "@material-ui/icons/ArrowUpward";

// core components
import HeaderUser from './../../Components/HeaderUser';
import DashboardLayout from '../../Layouts/DashboardLayout';
import {
  chartOptions,
  parseOptions,
  chartExample1,
  chartExample2,
} from "../../../../Argon/variables/charts.js";

import componentStyles from "../../../../Argon/Assets/theme/views/admin/dashboard";

import ContactListTable from './../../Components/ContactListTable';
import PaginationLinks from './../../Components/PaginationLinks';

const useStyles = makeStyles(componentStyles);

function Dashboard({leads, leadsMonth, leadsDataCount}) {
  const classes = useStyles();

  const theme = useTheme();
  const [activeNav, setActiveNav] = React.useState(1);
  const [chartExample1Data, setChartExample1Data] = React.useState("data1");

  if (window.Chart) {
    parseOptions(Chart, chartOptions());
  }

  const toggleNavs = (index) => {
    setActiveNav(index);
    setChartExample1Data("data" + index);
  };
  return (
    <DashboardLayout title='Dashboard'>

      <HeaderUser />

      {/* Page content */}
      <Container
        maxWidth={false}
        component={Box}
        marginTop="-6rem"
        classes={{ root: classes.containerRoot }}
      >



        <Grid container>

          <Grid item xs={12} xl={12}>
            <Card classes={{ root: classes.cardRoot }}>
              <CardHeader
                title={
                  <Box component="span" color={theme.palette.gray[600]}>
                    {new Date().getFullYear()} stats
                  </Box>
                }
                subheader="CONTACTS"
                classes={{ root: classes.cardHeaderRoot }}
                titleTypographyProps={{
                  component: Box,
                  variant: "h6",
                  letterSpacing: ".0625rem",
                  marginBottom: ".25rem!important",
                  classes: {
                    root: classes.textUppercase,
                  },
                }}
                subheaderTypographyProps={{
                  component: Box,
                  variant: "h2",
                  marginBottom: "0!important",
                  color: "initial",
                }}
              ></CardHeader>
              <CardContent>
                <Box position="relative" height="350px">
                  <Bar
                    data={
                      {
                        labels: leadsMonth,
                        datasets: [
                          {
                            label: "Contacts",
                            data: leadsDataCount,
                            maxBarThickness: 30,
                          },
                        ],
                      }
                    }
                    options={
                      {
                        scales: {
                          yAxes: [
                            {
                              ticks: {
                                callback: function (value) {
                                  if (!(value % 10)) {
                                    //return '$' + value + 'k'
                                    return value + ' Contacts';
                                  }
                                },
                              },
                            },
                          ],
                        },
                        tooltips: {
                          callbacks: {
                            label: function (item, data) {
                              var label = data.datasets[item.datasetIndex].label || "";
                              var yLabel = item.yLabel;
                              var content = "";
                              if (data.datasets.length > 1) {
                                content += label;
                              }
                              content += yLabel;
                              return content;
                            },
                          },
                        },
                      }
                    }
                  />
                </Box>
              </CardContent>
            </Card>
          </Grid>
        </Grid>


        <Grid container component={Box} marginTop="3rem">
          <Grid
            item
            xs={12}
            xl={12}
            component={Box}
            marginBottom="3rem!important"
            classes={{ root: classes.gridItemRoot }}
          >


            <Card classes={{ root: classes.cardRoot }}>
              <CardHeader
                className={classes.cardHeader}
                title="Contact list"
                titleTypographyProps={{
                  component: Box,
                  marginBottom: "0!important",
                  variant: "h3",
                }}
              ></CardHeader>

              <ContactListTable leads={leads} />

              <Box
                classes={{ root: classes.cardActionsRoot }}
                component={CardActions}
                justifyContent="flex-end"
              >

                <PaginationLinks
                  data={leads}
                  path='/user/leads'
                />
              </Box>
            </Card>

          </Grid>
        </Grid>
      </Container>
    </DashboardLayout>
  );
}

export default Dashboard;

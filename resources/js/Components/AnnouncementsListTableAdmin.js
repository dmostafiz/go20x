import React from 'react'
import LinearProgress from "@material-ui/core/LinearProgress";
import Menu from "@material-ui/core/Menu";
import MenuItem from "@material-ui/core/MenuItem";
import Table from "@material-ui/core/Table";
import TableBody from "@material-ui/core/TableBody";
import TableCell from "@material-ui/core/TableCell";
import TableContainer from "@material-ui/core/TableContainer";
import TableHead from "@material-ui/core/TableHead";
import TableRow from "@material-ui/core/TableRow";
import Tooltip from "@material-ui/core/Tooltip";
// @material-ui/lab components
import AvatarGroup from "@material-ui/lab/AvatarGroup";
import Pagination from "@material-ui/lab/Pagination";
// @material-ui/icons components
import MoreVert from "@material-ui/icons/MoreVert";
import moment from "moment";
import { Inertia } from "@inertiajs/inertia";
import Button from "@material-ui/core/Button";
import Avatar from "@material-ui/core/Avatar";
import Box from "@material-ui/core/Box";
import { makeStyles } from '@material-ui/core/styles';
import componentStyles from "../../../Argon/Assets/theme/views/admin/tables.js";
import { useTheme } from "@material-ui/core/styles";
import IconButton from '@material-ui/core/IconButton';
import DeleteIcon from '@mui/icons-material/Delete';
import truncate from '@/Hooks/truncate.js';

const useStyles = makeStyles(componentStyles);

export default function AnnouncementsListTableAdmin({ announcements }) {
    const classes = useStyles();
    const theme = useTheme();

    const handleDelete = (announcementId) => {
        Inertia.post('/admin/delete_announcement', {announcementId})
    };

    return (
        <TableContainer>
            <Box
                component={Table}
                alignItems="center"
                marginBottom="0!important"
            >

                <TableHead>
                    <TableRow>
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            #
                        </TableCell>
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Image
                        </TableCell>
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Title
                        </TableCell>

                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Description
                        </TableCell>

                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Date
                        </TableCell>
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        ></TableCell>
                    </TableRow>
                </TableHead>

                <TableBody>
                    {announcements?.data.map((anc, index) =>
                        <TableRow key={index}>
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {index + 1}
                            </TableCell>
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                <img width='100px' src={'/' + anc.image} />
                            </TableCell>
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {anc.title}
                            </TableCell>
                            <TableCell >
                                {/* <Box maxWidth='400px' overflow='hidden'> */}
                                    <p>{truncate(anc.description, 70, '...')}</p>
                                {/* </Box> */}
                            </TableCell>

                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {moment(anc.created_at).format('lll')}
                            </TableCell>

                            <TableCell
                                classes={{ root: classes.tableCellRoot }}
                                align="right"
                            >
                                <IconButton onClick={() => handleDelete(anc.id)} color="danger" aria-label="delete">
                                    <DeleteIcon color="error" />
                                </IconButton>

                            </TableCell>
                        </TableRow>)}

                </TableBody>
            </Box>
        </TableContainer>
    )
}

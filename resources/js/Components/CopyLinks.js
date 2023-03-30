import * as React from 'react';
import Button from '@mui/material/Button';
import Dialog from '@mui/material/Dialog';
import DialogActions from '@mui/material/DialogActions';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import DialogTitle from '@mui/material/DialogTitle';
import ClickAndCopy from './ClickAndCopy';
import Box from '@material-ui/core/Box';
import Typography from '@material-ui/core/Typography';

export default function CopyLinks() {
  const [open, setOpen] = React.useState(false);

  const handleClickOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };

  return (
   
    <div>
      {/* 
      <Button color="info" variant="contained" onClick={handleClickOpen}>
        Copy Sponsor links
      </Button>
  */}
      <Dialog
        open={open}
        onClose={handleClose}
        aria-labelledby="alert-dialog-title"
        aria-describedby="alert-dialog-description"
        size='lg'
      >
        <DialogTitle id="alert-dialog-title">
          Sponsor Links
        </DialogTitle>
        <DialogContent dividers>

          <Box mb={2}>
            <Typography variant="caption">Landing Page</Typography>
            <ClickAndCopy page='landing'/>
          </Box>

          <Box mb={2}>
            <Typography variant="caption">Order Page</Typography>
            <ClickAndCopy page='ordernow'/>
          </Box>

          <Box mb={2}>
            <Typography variant="caption">Main Page</Typography>
            <ClickAndCopy page='start'/>
          </Box>


        </DialogContent>
        <DialogActions>
          <Button onClick={handleClose} variant='ghost' disableElevation>Close</Button>
        </DialogActions>
      </Dialog>
    </div>
  );
}
import { Link } from "@inertiajs/react";
import { Monitor, Smartphone } from "lucide-react";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";
import * as React from "react";

import {
	Button,
	Card,
	CardContent,
	CardFooter,
	CardHeader,
	CardTitle,
	Table,
	TableCell,
	TableHead,
	TableHeader,
	TableRow,
} from "@narsil-ui/Components";

const SessionController = ({ sessions }: SessionControllerProps) => {
	const { trans } = useTranslationsStore();

	return (
		<Card>
			<CardHeader>
				<CardTitle>{trans("common.sessions")}</CardTitle>
			</CardHeader>
			<CardContent>
				<Table>
					<TableHeader>
						<TableHead>{trans("validation.attributes.device")}</TableHead>
						<TableHead>{trans("validation.attributes.IP")}</TableHead>
						<TableHead>{trans("validation.attributes.status")}</TableHead>
					</TableHeader>
					{sessions.map((session, index) => {
						return (
							<TableRow key={index}>
								<TableCell>
									<div className='flex items-center gap-x-2'>
										{session.isDesktop ? (
											<Monitor className='h-5 w-5' />
										) : (
											<Smartphone className='h-5 w-5' />
										)}
										<span>{`${session.platform} - ${session.browser}`}</span>
									</div>
								</TableCell>
								<TableCell>{session.ip_address}</TableCell>
								<TableCell className={`${session.isCurrentDevice ? "text-primary" : ""}`}>
									{session.isCurrentDevice ? trans("common.current_device") : session.last_activity}
								</TableCell>
								<TableCell>
									<Button
										className='text-destructive'
										asChild={true}
										variant='link'
									>
										<Link
											method='delete'
											href={route("sessions.destroy", session.id)}
										>
											{trans("verbs.logout")}
										</Link>
									</Button>
								</TableCell>
							</TableRow>
						);
					})}
				</Table>
			</CardContent>
			<CardFooter>
				<Button asChild={true}>
					<Link href={route("sessions.destroy-other")}>{trans("Log out from other sessions")}</Link>
				</Button>
				<Button
					asChild={true}
					variant='secondary'
				>
					<Link href={route("sessions.destroy-all")}>{trans("Log out of all sessions")}</Link>
				</Button>
			</CardFooter>
		</Card>
	);
};

export default SessionController;
